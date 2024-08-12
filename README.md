// product variant 
  $table->id();
            $table->bigInteger('product_id');
            $table->string('title', 200);
            $table->string('sku', 200)->nullable();
            $table->string('barcode', 50)->nullable();
            $table->float('price');
            $table->string('album', 200)->nullable();
            $table->tinyInteger('publish')->default(1);
            $table->integer('user_id');
            $table->string('file_name')->nullable();
            $table->string('file_url')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            //product variant attribute
              $table->unsignedBigInteger('product_variant_id');
           $table->unsignedBigInteger('attribute_id');
           $table->foreign('product_variant_id')->references('id')->on('product_variants')->onDelete('cascade');
           $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
           