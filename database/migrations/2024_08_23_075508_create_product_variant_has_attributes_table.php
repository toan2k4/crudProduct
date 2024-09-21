<?php

use App\Models\Attribute;
use App\Models\AttributeItem;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_variant_has_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProductVariant::class)->constrained();
            $table->foreignIdFor(Attribute::class)->constrained();
            $table->foreignIdFor(AttributeItem::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variant_has_attributes');
    }
};
