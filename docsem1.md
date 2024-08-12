--------------------------
-user_catalogues:
$table->id();
$table->string('name');
$table->string('image')->nullable();
$table->text('description')->nullable();
$table->tinyInteger('publish')->default(1);
$table->timestamp('deleted_at')->nullable();
$table->timestamps();

-users:
$table->id();
$table->string('name');
$table->string('fullname', 50)->nullable();
$table->string('phone', 20)->nullable();
$table->string('province_id', 10)->nullable();
$table->string('district', 10)->nullable();
$table->string('ward_id', 10)->nullable();
$table->string('address')->nullable();
$table->dateTime('birthday')->nullable();
$table->string('image')->nullable();
$table->text('description')->nullable();
$table->string('email')->unique();
$table->timestamp('email_verified_at')->nullable();
$table->string('password');
$table->bigInteger('user_catalogue_id')->default(2)->unsigned();
$table->foreign('user_catalogue_id')->references('id')->on('user_catalogues');
$table->timestamp('deleted_at')->nullable();
$table->tinyInteger('publish')->default(1);
$table->rememberToken();
$table->timestamps();

-permissions
$table->id();
$table->string('name');
$table->string('canonical')->unique();
$table->timestamps();

-user_catalogue_permission
$table->unsignedBigInteger('user_catalogue_id');
$table->unsignedBigInteger('permission_id');
$table->foreign('user_catalogue_id')->references('id')->on('user_catalogues')->onDelete('cascade');
$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

------------------------
--Post


-post_catalogues
$table->id();
$table->integer('parent_id')->default(0);
$table->integer('_lft')->default(0);
$table->integer('_rgt')->default(0);
$table->string('image')->nullable();
$table->string('icon')->nullable();
$table->text('album')->nullable();
$table->tinyInteger('publish')->default(1);
$table->string('name');
$table->text('description');
$table->longText('content');
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
$table->timestamp('deleted_at')->nullable();
$table->timestamps();


-posts
$table->id();
$table->integer('post_catalogue_id')->default(0);
$table->string('image')->nullable();
$table->text('album')->nullable();
$table->tinyInteger('publish')->default(1);
$table->string('name');
$table->text('description');
$table->longText('content');
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
$table->timestamp('deleted_at')->nullable();
$table->timestamps();


-post_catalogue_post
$table->unsignedBigInteger('post_catalogue_id');
$table->unsignedBigInteger('post_id');
$table->foreign('post_catalogue_id')->references('id')->on('post_catalogues')->onDelete('cascade');
$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

----------------

-category
$table->id();
$table->string('name');
$table->string('image')->nullable();
$table->text('album')->nullable();
$table->tinyInteger('publish')->default(1);
$table->string('name');
$table->string('slug');
$table->text('description');
$table->longText('content');
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
$table->timestamp('deleted_at')->nullable();
$table->timestamps();


--------------
-products

$table->id();
$table->unsignedBigInteger('category_id');
$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
$table->string('image')->nullable();
$table->string('slug')->nullable();
$table->text('album')->nullable();
$table->tinyInteger('publish')->default(1);
$table->string('code')->default(0);
$table->string('made_id')->nullable();
$table->float('price')->default(0);
$table->float('sale_price')->default(0);
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
$table->timestamp('deleted_at')->nullable();
$table->timestamps();



----------
-orders
$table->increments('id');
$table->integer('user_id')->nullable(false)->unsigned();
$table->foreign('user_id')->references('id')->on('users');
$table->string('name', 150)->nullable(true);
$table->tinyInteger('status')->default(0);
$table->string('email', 150)->nullable(true)->unique();
$table->integer('phone')->nullable(true)->unsigned();
$table->string('address', 150)->nullable(true);
$table->timestamps();


-order-detail
$table->integer('order_id')->unsigned();
$table->integer('product_id')->unsigned();
$table->integer('quantity')->nullable(false)->unsigned();
$table->float('price', 150)->nullable(false);
$table->foreign('order_id')->references('id')->on('orders');
$table->foreign('product_id')->references('id')->on('products');
$table->timestamps();




--------------
Banner
-banners
id, image,title,slug, created_at, updated_at,



-----------------
Subscriber

subscribers
id, email, created_at, updated_at



-----------
coupons
id
name
details
code
percentage
validate
created_at
updated_at

------------- 
feedback 
    id	
	name	
	email	
	subject	
	feedback	
    created_at,
    updated_at



-------------------

CHECK-OUT
-payment
id
order_id
payment_method
payment_status
created_at
updated_at

--comment