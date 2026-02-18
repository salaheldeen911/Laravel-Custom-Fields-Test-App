<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Salah\LaravelCustomFields\Models\CustomField;
use Salah\LaravelCustomFields\Models\CustomFieldValue;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // Disable strict validation for seeding speed if needed, but we want to simulate real usage
        // config(['custom-fields.strict_validation' => false]);
        // Actually, let's keep it true to test validation performance too if we use the service.
        // But for pure data filling, direct DB might be faster.
        // The user said "I want to test performance", implying the system's performance.
        // I'll use the proper flow: creating fields, then creating models with data.

        $this->command->info('Truncating old data...');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        CustomFieldValue::truncate();
        CustomField::truncate();
        Post::truncate();
        Product::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->seedModel('post', Post::class, 50, 1000);
        $this->seedModel('product', Product::class, 50, 1000);
    }

    protected function seedModel($modelAlias, $modelClass, $fieldCount, $recordCount)
    {
        $this->command->info("Seeding $modelAlias: Creating $fieldCount custom fields...");

        $fields = [];
        for ($i = 1; $i <= $fieldCount; $i++) {
            $type = match ($i % 4) {
                0 => 'number',
                1 => 'date',
                2 => 'select',
                default => 'text',
            };

            $options = $type === 'select' ? ['A', 'B', 'C'] : null;

            $fields[] = CustomField::create([
                'name' => ucfirst($modelAlias) . " Field $i",
                'slug' => "{$modelAlias}_field_$i",
                'model' => $modelAlias,
                'type' => $type,
                // 'description' => "Performance test field $i", // Column does not exist
                'options' => $options,
                'validation_rules' => [], // Keep it simple for now
                'required' => false,
                // 'is_active' => true, // Column does not exist
                // 'order' => $i, // Column does not exist
            ]);
        }

        $this->command->info("Seeding $modelAlias: Creating $recordCount records with custom data...");

        $this->command->getOutput()->progressStart($recordCount);

        // Batch size for transactions
        $batchSize = 100;

        for ($i = 0; $i < $recordCount; $i += $batchSize) {
            DB::transaction(function () use ($batchSize, $i, $fields, $modelClass, $modelAlias) {
                for ($j = 0; $j < $batchSize; $j++) {
                    if (($i + $j) >= 1000) break;

                    // Create Main Model
                    if ($modelAlias === 'post') {
                        $model = $modelClass::create([
                            'title' => "Post " . ($i + $j),
                            'content' => "Content for post " . ($i + $j),
                        ]);
                    } else {
                        $model = $modelClass::create([
                            'name' => "Product " . ($i + $j),
                            'price' => rand(10, 1000),
                            'description' => "Desc for product " . ($i + $j),
                        ]);
                    }

                    // Prepare Custom Data
                    $customData = [];
                    foreach ($fields as $field) {
                        $val = match ($field->type) {
                            'number' => rand(1, 1000),
                            'date' => now()->subDays(rand(1, 365))->toDateString(),
                            'select' => ['A', 'B', 'C'][rand(0, 2)],
                            default => "Value for {$field->slug}",
                        };
                        $customData[$field->slug] = $val;
                    }

                    // Store Custom Fields
                    // Use the newly added unified saving property if available, or the standard method.
                    // Since we are creating fresh, we can't use the 'saved' event on creation easily without 'create(attributes)'.
                    // But here we already created the model.
                    // Note: validation is skipped here for raw speed, we call storeValues directly via service or helper,
                    // but wait, storeValues DOES validate by default if strict is on.
                    // To speed up seeding, we can manually insert or use the service.
                    // Let's use the trait method to test "real" performance including overhead.

                    // We need to bypass validation for speed? No, let's test with validation.
                    // But we generated valid data.

                    // We need to manually mark as validated to avoid 'ValidationIntegrityException' if strict mode is on.
                    // Or just turn off strict mode for the seeder.

                    // Let's use the explicit save to keep it simple and robust.
                    // And since we are generating data, we know it's valid, but the service doesn't know.
                    // So we must validate or disable strict.

                    // Disabling strict for seeding is standard practice.
                    config(['custom-fields.strict_validation' => false]);

                    $model->saveCustomFields($customData);
                }
            });

            $this->command->getOutput()->progressAdvance(min($batchSize, $recordCount - $i));
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info("Done seeding $modelAlias.");
    }
}
