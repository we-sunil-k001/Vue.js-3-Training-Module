1. Composer 
    - Composer is a tool for managing dependencies in PHP. It allows you to easily manage and install libraries that your PHP project needs.
    - Eg: bootstrap, Php mailer, Jquery, etc. 
    - It uses https://packagist.org/ to installs dependencies in you system

2. composer.json
    composer.json is a file used by Composer to manage your project's dependencies. 
    It contains information about your project and the libraries it depends on. 
    - Here you define what packages/ libraries you need in your project, below is syntax:
    -   {
            "require": {
                "twbs/bootstrap": "v5.3.2"
            }
        }

    - Run : "composer install" in terminal, it will install bootstrap under "Vendor" folder

    - Note: if installed dependeny requires any other dependeny so files related to that depen. will also get installed and so on.
            and every dependeny will have its own composer.json, where you can see "require" for other dependencies.


3. Namespaces: A namespace in PHP is like a virtual directory for your code. It helps you organize your code and avoid naming conflicts
                 between different parts of your application or with code from third-party libraries. 

    Why Use Namespaces?
    Avoid Naming Conflicts: If you and a third-party library both have a class named User, namespaces help distinguish between them.
    Organize Code: They allow you to group related classes, interfaces, functions, and constants together in a logical way.


4. // Let's pass some data to view through Route itself

    Route::get('/example', function (){
        $variable = "Hello Example php";


        // 1st way directly
        //return view('example', ['variable' => $variable]);

        // 2nd way using "compact()"
        //return view('example',compact('variable'));

        // 3rd way using "with()"
        return view('example')->with(['variable' => $variable]);

    });


    {{--display the data received through route--}}

    <h1>{{ $variable }}</h1>

    //But if there is no data pass in the variable

    @unless($variable)
    <h1>No Date received from Route!</h1>
    @endunless


5. Yeild and section    (No ; are required)
    @yield:
        - @yield is used in a layout to create a placeholder for content that will be provided by child views.
        - It defines where the content from the child views should be inserted.

    @section:
        - @section is used in child views to define content for a named section.
        - It specifies what content should go into the placeholders defined by @yield in the layout.

    #2 ways of creating placeholder:
        - @yield('title')   : used for specific content such as title

        - @section('body')  : used for a section such as body
            @show

    #Defining that placeholder in child view:
        - When you use @section with a single line of content, you can use a shorthand version that does not require @endsection:
            @section('title', 'Example Page')

        - For sections that include more content, or multiple lines, you use the full syntax, which includes @section and @endsection.
        @section('content')
            <h2>Welcome to the Example Page</h2>
            <p>{{ $variable }}</p>
        @endsection


    # How to extend layout in child views:

        @extends('layout.layout')


    # @include
        The @include directive in Laravel Blade templating engine allows you to include a Blade view inside another Blade view. 
        This is particularly useful for reusing common components such as headers, footers, or any other partial views.



6. Named Route:

    - Named routes in Laravel provide a way to refer to your routes with a specific name instead of using the URL or route definition. 
    - You can assign a name to a route using the name method in the route definition. Here’s an example:
        Route::get('/example', function () {
            return view('example');
        })->name('example');

    - How to pass name behalf of route in view:
        <a href="{{route('about-page')}}">About </a>

    # When there is some variable going with route:

        -   Route::get('/contact/{id}', function($id){ 
                return view('contact', ['id' => $id]); 
            })->name('contact-page');

        -   Passing name with variable:
            <a href="{{route('contact-page', 5)}}">Contact </a>

        - Dislpay the variable got from route:
            <h3> Id = {{$id}}</h3>


7. Grouped Route:

    Grouped routes in Laravel allow you to share attributes, such as middleware or namespaces, 
    across a large number of routes without needing to redefine them each time. 
    This is particularly useful for organizing and managing routes in large applications.

    #Basic Route Grouping:

        Route::group(['prefix' => 'admin'], function () {

            Route::get('/dashboard', function () {
                return 'Admin Dashboard';
            })->name('admin.dashboard');

            Route::get('/users', function () {
                return 'Admin Users';
            })->name('admin.users');

        });
    
    
    # Route Group with Middleware

    Route::group(['middleware' => ['auth', 'admin']], function () {

        Route::get('/dashboard', function () {
            return 'Admin Dashboard';
        })->name('admin.dashboard');

        Route::get('/users', function () {
            return 'Admin Users';
        })->name('admin.users');

    });



8. What is Middleware?

    Middleware in Laravel is a mechanism for filtering HTTP requests entering your application. It sits between the incoming request and 
    the application's response, allowing you to perform various checks or modifications before the request reaches your controller or after 
    the controller has processed the request but before the response is sent back to the client.

    # Common Use Cases for Middleware
        - Authentication: Ensuring the user is logged in.
        - Authorization: Checking if the user has permission to access a resource.
        - CSRF Protection: Preventing Cross-Site Request Forgery attacks.
        - Logging: Logging each request for debugging or analytics.
        - CORS: Adding Cross-Origin Resource Sharing headers to responses.

    # Creating Middleware - step 1.
        php artisan make:middleware >>CheckAge<<

    # Middleware got created can see inside app > http > middleware     - Step 2

    # Registering Middleware                                            - Step 3
        To use your middleware, you need to register/ mention it in the app/Http/Kernel.php file.

        protected $middleware = [
            // Other middleware
            \App\Http\Middleware\CheckAge::class,
        ];

    # Two Type in Middleware

        1. Global Middleware:

            protected $middleware = [
                // Other middleware
                \App\Http\Middleware\CheckAge::class,
            ];
        
        2. Route Middleware

            protected $routeMiddleware = [
                // Other middleware
                'checkage' => \App\Http\Middleware\CheckAge::class,
            ];



9. View Blade Template: - Displaying data:

                        //Normal php 
                        <?php echo $username; ?>

                        // With Blade tags
                        {{ $username }}

                        
                        - Ternary statement 
                        {{ isset($title) ? $title: 'My Apps' }}


                        - Default value
                        {{ $title or 'My App' }}


10. @stack
The @stack directive in Laravel Blade templates is used to push and render content in specific sections of your layout. This is particularly useful when you want to add content from different parts of your application (like scripts or styles) into a single section of your layout, such as the <head> or just before the closing </body> tag.

How to Use @stack
Define a Stack in Your Layout
Push Content to the Stack
Render the Stack Content

<!-- resources/views/layout.blade.php -->
<head>
    <title>My Application</title>
    <!-- Base styles -->
    <link rel="stylesheet" href="/css/app.css">

    <!-- Stack for additional styles -->
    @stack('styles')
</head>


<!-- resources/views/home.blade.php -->
@push('styles')
    <link rel="stylesheet" href="/css/style1.css">
@endpush

<!-- resources/views/home.blade.php -->
@push('styles')
    <link rel="stylesheet" href="/css/style2.css">
@endpush


11. Controller:
    In Laravel, a controller is a class that handles incoming HTTP requests and returns responses. 
    Controllers help you organize your application by grouping related request handling logic into a single class.

    php artisan make:controller ExampleController

    Types of Controllers

        Basic Controllers -     You define methods in the controller, and each method handles a specific route.
        Resource Controllers -  Resource controllers handle CRUD (Create, Read, Update, Delete) operations. Laravel can automatically create routes for these operations using a resource controller.
        API Resource Controllers - 
        Invokable Controllers
        Single Action Controllers - Single action controllers are like invokable controllers but without the invokable syntax. They still have only one method, typically named for the action they perform.


    # To call Basic controller from Route

        php artisan make:controller BasicController

        Route::get('/', [BasicController::class,'index']);  //here we have created array bcs, there can multiple functions


    # To call Single Action controller from Route

        php artisan make:controller SingleActionController  --invokable

        Route::get('/', [BasicController::class,'index']);  //here we have created array bcs, there can multiple functions


    # To call Resource controller from Route

        php artisan make:controller CustomerController  --resource

        Route::resource('/customer', CustomerController::class);

    # Steps to use Controller

        1st. Create a controller by using cmd:

            php artisan make:controller CustomerController  --resource          //In case resurce controller, for others cmds are give above

        2nd. Define the function inside that controller

        3rd. Call thet controller from route - web.php

            Route::resource('/customer', CustomerController::class);            //In case resurce controller, for others cmds are give above



12. Common HTTP Request Methods
    GET
    POST
    PUT/PATCH
    DELETE

    1st. GET
        Purpose: Retrieve data from the server.
        Example Uses: Display a list of items, show a form, fetch a specific item by its ID.

    2. POST
        Purpose: Submit data to the server to create a new resource.
        Example Uses: Submit a form to create a new user, add a new item to a list.

    3. PUT/PATCH
        Purpose: Update an existing resource on the server.
        Example Uses: Update user information, edit an item in a list.

        - Form :
            <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="name" value="{{ $user->name }}" required>
                <input type="email" name="email" value="{{ $user->email }}" required>
                <button type="submit">Update User</button>
            </form>
        
        - // Route definition
          Route::put('/users/{id}', [UserController::class, 'update']);  // Update an existing user

    4. DELETE
        Purpose: Remove a resource from the server.
        Example Uses: Delete a user, remove an item from a list.

        - Form
            <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                @csrf
                @method('DELETE')
                <button type="submit">Delete User</button>
            </form>

        - // Route definition
        Route::delete('/users/{id}', [UserController::class, 'destroy']);  // Delete a user

            
    5. HEAD
        Purpose: Retrieves the headers for a resource without the body.
        Use Case: Often used to check if a resource exists or to obtain metadata (such as content type or length) without downloading the entire resource.

        - // Route definition
            Route::head('/headers', [HeaderController::class, 'showHeaders']);

    6. PATCH
        Purpose: Applies partial modifications to a resource.
        Use Case: Use when you need to update some fields of a resource but not the entire resource.

        // Route definition
        Route::patch('/users/{id}', [UserController::class, 'update']);

    7. OPTIONS
        Purpose: Describes the communication options for a resource, such as which HTTP methods are supported.
        Use Case: Commonly used in CORS (Cross-Origin Resource Sharing) to determine which methods and headers are allowed by the server.

        // Route definition
        Route::options('/resource', [OptionsController::class, 'handleOptions']);
    
    Steps:
            (i) create a User file eg: user and add a form
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name"  required>
                    <input type="text" name="address"  required>
                    <button type="submit">Update User</button>
                </form>
            
            (ii) Create a route for above form

                Route::get('/user',[UserController::class,'index']);
                // =========================================
                // Put
                Route::delete('/user', [userController::class, 'update']);
            
            (iii) Run methods called in route in controller:
                class UserController extends Controller
                {
                    public function index()
                    {
                        return view('user');
                    }
                    public function update(Request $request){
                        return $request->input();
                    }
                }

            NOte:   - $request->input();
                    - Adding a namespace to controller in route (web.php) is must

13. $request variable
    The $request variable is an instance of the Illuminate\Http\Request class, which provides an interface for interacting with HTTP requests. 
    The $request variable is typically injected into controller methods to access and handle the data from the request.


14. Controller - Form Request Validation

    Step 1. Create view having form 

    <form action="{{url('/user')}}" method="POST">
            @csrf
        {{--            <pre>--}}
        {{--                @php--}}
        {{--                    print_r($errors->all());--}}
        {{--                @endphp--}}
        {{--            </pre>--}}

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input type="name" name="name" class="form-control" value="{{old('name')}}" id="inputEmail4">
                    <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Mobile no.</label>
                    <input type="mobile" name="mobile" class="form-control" value="{{old('mobile')}}"  id="inputPassword4">
                    <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}"  id="inputEmail4">
                    <span class="text-danger">
                        @error('email')
                            {{$message}}
                        @enderror
                    </span>
                </div>

            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4">
                    <span class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Confirm Password</label>
                    <input type="password" name="confirm_pass" class="form-control" id="inputPassword4">
                    <span class="text-danger">
                        @error('confirm_pass')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            </div>

            <button type="submit" class="btn w-100 mt-2 btn-primary">Register</button>
        </form>

    step 2. Create a route for the form - action, calling  method from relative controller
            Route::post('/user', [UserController::class,'store']);


    step 3. define validation in methor - controller
                
            class UserController extends Controller
            {
            
                public function store(Request $request)
                {
                    $request->validate(
                        [
                            'name' => 'required',
                            'mobile' => 'required',
                            'email' => 'required|email',
                            'password' => 'required|confirmed',
                            //'password_confirmation' => 'required'       // Here for pass confirmation must use stand. 'password_confirmation' other input name wont work
                            'confirm_pass' => 'required|same:password'              // if not use standard 'password_confirmation' this will work
                        ]
                    );
                    return $request->input();
                }
            }

    Note:   -   $errors->all()  : Display all the validation error in array

            -   <span>   
                    @error('name')
                        {{$message}}
                    @enderror
                </span>

                It display specific error to the input field

            -   'password_confirmation' => 'required'       : Here for pass confirmation validation must use standard input-name 'password_confirmation' other any name wont work
            -   'confirm_pass' => 'required|same:password'   : if not use standard 'password_confirmation' this will work


15. response()

16. redirect()
    The redirect() helper in Laravel is used to create a response that redirects the user's browser to another URL. 
    This can be useful for guiding users to different parts of your application after a certain action has been performed, 
    such as submitting a form or completing an action.


    #Basic Redirect
        - Redirect to a URL:
            return redirect('/home');

        - Redirect to a Named Route:
            return redirect()->route('home');
        
        - Redirect to a Controller Action:
            return redirect()->action([HomeController::class, 'index']);

        - return redirect()->away('https://www.google.com');

        Redirect with Flash Data : Flash data is session data that is only available for the next request. 
                                    It's useful for passing status messages or other temporary data to the next page.

            (i) Redirect with Flash Message:

                return redirect('/home')->with('status', 'Profile updated!');

            (ii) Redirect with Multiple Flash Data:

                return redirect('/home')->with([
                    'status' => 'Profile updated!',
                    'otherKey' => 'Other value'
                ]);


17. Sessions:
    sessions provide a way to store information across multiple requests for a user. This can be useful for storing data such as user 
    login information, flash messages, and other temporary data that needs to persist across different pages.


    # Retrieve Session: 

        (i) To get all session date at once:
            session()->all();
            Above gives you all the sessiones set in an Array.

            eg:   Route::get('/get-all-session', function (){
                    $session = session()->all();
                    print_r($session);
                });

        (ii) TO get any particular data from session:
        session()->get();

            eg:  Route::get('/get-session', function (){
                    $session = session()->get('name');
                    print($session);
                });
    
    # Store Session: 
        
        step1. use Illuminate\Http\Request;

        Step 2. 
            Route::get('/store-session', function (Request $request){
                $request->session()->put([
                    'name' => 'Sunil',
                    'Emp_id' => '21'
                ]);

                return redirect('/get-all-session');
            });


    # Destroy data from session
        (i) forget()
                Route::get('/forget-session', function (){
                    $session = session()->forget('name');
                    return redirect('/get-all-session');
                });
            
        
    # session()->has()          : to validate if session active
        eg: in any view page
            <title>
                @if(session()->has('name'))
                    {{session()->get('name')}}
                    @else
                        Training sessions
                @endif
            </title>

    
    # flash: Here the session will store and get active only for one time, once new request come that data will auto get deleted
        eg:-

            Route::get('/store-session', function (Request $request){
                $request->session()->flash('status','Active');

                return redirect('/get-all-session');
            });


18. Migrations:
    Migrations are a way to manage your database schema over time. They allow you to define the structure of your database in PHP 
    code and provide a simple way to version control your database changes.

    #Basic Concepts
        Migrations: These are files that define how your database schema should be created, modified, or deleted.
        Migration Files: Each migration file contains two main methods: up and down.
            - up: Defines the changes to apply to the database.
            - down: Defines how to reverse those changes.

        Running the migrate:reset or migrate:refresh commands will delete all records in your database tables.      --IMP

    # Creating a Migration:
        Step 1. php artisan make:migration create_users_table

        step 2.
                $table->id('customer_id');
                    $table->string('name', 100);
                    $table->string('email', 100);
                    $table->string('mobile_no', 10);
                    $table->enum('gender', ['M','F','O'])->nullable();
                    $table->string('address')->nullable();
                    $table->boolean('status')->default('1');
                    $table->timestamps();
     

    #   Running Migrations
        php artisan migrate

    #   Rolling Back Migrations : If you need to undo the last batch of migrations, use the migrate:rollback command:

        php artisan migrate:rollback

    #   To rollback all migrations and reset the database, use the migrate:reset command:
   
        php artisan migrate:reset 

    #   To rollback and re-run all migrations, use the migrate:refresh command:

        php artisan migrate:refresh

    #   TO add new column in the same table

        Step 1. php artisan make:migration add_column_to_customers_table

        step 2. 
        $table->string('city','50')->nullable()->after('address');
        $table->string('state','60')->nullable()->after('address');

        step 3. php artisan migrate

    #  Add foriegn key
            Step 1 . Branches table:
                $table->id('branch_id');
                $table->string('name');
                $table->string('about_group');
                $table->timestamps()-useCurrent();

                //$table->timestamps()-usecurrentOnUpdate();

            Step 2. Employees table: 

                $table->unsignedBigInteger('branch_id')->after('mobile_no');
                $table->foreign('branch_id')->references('branch_id')->on('branches');          --IMP
                
                                        OR
                
                $table->foreignId('branch_id')->constrained('branches');

            Step 3. Now when you insert in employees, you'll can insert only those record/ ID in branch_id which is available in branches table, else - get error

    
    # Renaming a table
            Step1. Create the Migration
                    php artisan make:migration rename_users_table_to_members

            Step 2. Define the Migration

                public function up()
                {
                    Schema::rename('users', 'members');                 // --IMP
                }

                public function down()
                {
                    Schema::rename('members', 'users');
                }

            step 3. php artisan migrate

    # Dropping a particular table:

                1. php artisan make:migration drop_members_table    // create migration
                2.   
                    public function up()
                    {
                        Schema::dropIfExists('members');
                    }

                    public function down()
                    {
                        // Recreate the table with the necessary columns if needed
                        Schema::create('members', function (Blueprint $table) {
                            $table->id();
                            $table->string('name');
                            $table->string('email')->unique();
                            $table->timestamps();
                        });
                    }

                3. php artisan migrate

    # Drop column:
                1. php artisan make:migration drop_phone_number_from_employees_table
                2. $table->dropColumn('phone_number','city');
                3. same as prev.



    Note: - Tips for Migration - https://www.youtube.com/watch?v=bSQcmcu6yHc&t=684s

    
18. Seeder:
        In Laravel, seeders are used to populate your database with initial data. They are particularly useful for seeding tables
        with dummy data for development or testing purposes.

    Seeder:
        A seeder in Laravel is a tool used to add sample data to your database. This is useful for testing or setting up your application with initial data.

    Faker:
        Faker is a library used to create fake data like names, emails, addresses, etc. Laravel uses Faker in factories to generate this fake data for testing purposes.


    (i) Create a Seeder
        php artisan make:seeder EMployeeSeeder

    (ii) Define the Seeder : in database/seeders/<table_name>Seeder.php eg: EmployeeSeeder.php
         Then inside EmployeeSeeder.php:

            -   Namespace to model 
                    use App\Models\Employee;


            -   Then inside function run() define the operation:
                public function run(): void
                {
                    $employee = new Employee;

                    $employee->name = 'John Doe';
                    $employee->email = 'john@example.com';
                    $employee->mobile_no = '1234567890';
                    $employee->gender = 'M';
                    $employee->address = '123 Main St';
                    $employee->status = 1;
                    $employee->branch_id = 1; // Assuming branch_id 1 exists

                    $employee->save();
                }


            //===============================================
            // To insert unique records:

            -   Namespace to model 
                    use App\Models\Employee;
                    use Faker\Factory as Faker;         --IMP class "as Faker" : can give any name but relative


            -   Then inside function run() define the operation:
              
                $faker = Faker::create();
                for ($i=1; $i<=100;$i++)
                {
                    $employee = new Employee;
                    $employee->name = $faker->name;
                    $employee->email = $faker->email;
                    $employee->mobile_no = $faker->numerify('##########');
                    $employee->gender = $faker->randomElement(['M', 'F', 'O']);
                    $employee->address = $faker->address;
                    $employee->status = $faker->boolean;
                    $employee->branch_id = 1; // Assuming branch_id 1 exists

                    $employee->save();
                }

                Note: To insert multiple record at once can use For loop.

            //===============================================



        (iii)   Call EmployeeSeeder from DatabaseSeeder.php

                    public function run(): void
                    {
                        $this->call([
                            employeeSeeder::class
                        ]);
                    }
        
        (iV)    run cmd: php artisan db:seed    (It'll insert record in the table)


19. Model:
    A model in Laravel represents a table in your database and provides an easy way to interact with the data within that table. 
    Models allow you to query for data, insert new records, update existing records, and delete records, all while using a simple and expressive syntax.
    
    - Creating a Model with Additional Components
        (i). Create a Model with a Migration

                php artisan make:model Employee -migration

        (ii) Create a Model with a Controller

                php artisan make:model Employee -controller

        (iii) Create a Model with a Factory

                php artisan make:model Employee -factory

        (iv)  Create a Model with a Seeder

                php artisan make:model Employee -seed

        (v)  Create a Model with All of the Above

                php artisan make:model Employee -migration -controller -factory -seed

    
    -  The table name associated with a model is, by default, the plural form of the model name. 
        However, you can explicitly define the table name if it doesn't follow this convention or if you want to specify a different name. 

        eg: Model :- Student
            Table :- students
    
    - Key Properties of a Model:
        (i) $table: Specifies the table associated with the model
                    
                protected $table = 'my_custom_table';
        
        (ii) $primaryKey: Specifies the primary key of the table.

                protected $primaryKey = 'custom_id';
        
        (iii) $keyType: Specifies the data type of the primary key. The default is int.

                protected $keyType = 'string';

        
        (iv) $incrementing: Indicates if the primary key is auto-incrementing. The default is true.

                public $incrementing = false;

        
        (v) $timestamps: Indicates if the model should be timestamped. The default is true. If set to false, the model will not expect created_at and updated_at columns.

                public $timestamps = false;

        
        (vi) $dateFormat: protected $dateFormat = 'U';

                protected $dateFormat = 'U';

        (vii) $connection: Specifies the database connection to be used by the model.        ;

                protected $connection = 'sqlite';
        
        (viii) $fillable: An array of attributes that are mass assignable.        ;

                protected $fillable = ['name', 'email', 'password'];






    #   Key Concepts
            ORM (Object-Relational Mapping): Laravel uses Eloquent ORM, which allows you to interact with your database using object-oriented syntax.

    # ORM:
                    
        1. Retrieving All Data from table:

            $employees = Employee::all(); // Retrieve all employees

            $employee = Employee::find(1); // Retrieve a single employee by primary key

        2. Retrieving with "WHERE" condition

            $student = student::where('class','12th')->orderBy('name')->get();

            $students = Student::where('class', '12th')
                   ->where('status', 'active')
                   ->orderBy('name')
                   ->get();


        3. Chunking Retrieved data

        4.  Retrieve a single model instance
                    
            (i) Using find : The find method retrieves a model by its primary key:

                $student = Student::find($id);
                    
            (ii) Using first : The first method retrieves the first result of a query:

                $student = Student::where('class', '12th')->first();

            (iii) Usinf firstOr


            (iv) firstOrCreate : Retrieving or creating model- The firstOrCreate method retrieves the first record matching the given attributes or creates a new record 
                                                with those attributes if none is found.

                    $student = Student::firstOrCreate(
                        ['email' => 'example@example.com'], // Attributes to search for
                        ['name' => 'John Doe', 'class' => '12th'] // Attributes to set if creating
                    );

                    NOte: to do above, you need to make all the columns fillable, inside the model
                    protected $fillable = [ 'name', 'email', 'mobile','class','state',];


            (v) firstOrNew : The firstOrNew method retrieves the first record matching the given attributes or creates a new instance with those attributes 
                                without saving it to the database.

                                $student = Student::firstOrNew(
                                    ['email' => 'example@example.com'], // Attributes to search for
                                    ['name' => 'John Doe', 'class' => '12th'] // Attributes to set if creating
                                );

                    Ote: to do above, you need to make all the columns fillable, inside the model
                    protected $fillable = [ 'name', 'email', 'mobile','class','state',];


        5. Retrieving Aggregate: you can use Eloquent or the query builder to retrieve aggregate values like count, max, min, avg, and sum.

            (i) Count: To get the count of records:

                $count = Student::count();

            (ii) Max

                $max = Student::max('score');

            (iii) Min

                $min = Student::min('score');

            (iv) Average

                $average = Student::avg('score');

            (v) Sum

                $sum = Student::sum('score');

        
        6. INSERT:

                use App\Models\Student;

                $student = new Student();
                $student->name = 'John Doe';
                $student->email = 'john.doe@example.com';
                $student->mobile_no = '1234567890';
                $student->class = '12th';
                $student->gender = 'M';
                $student->address = '123 Main St';
                $student->status = 1;
                $student->branch_id = 1;
                $student->save();                                       --IMP.


            - Alternatively, you can use mass assignment if the attributes are listed in the $fillable property of the model (--IMP. columns must be listed as fillable in model)

                use App\Models\Student;

                $student = Student::create([
                    'name' => 'John Doe',
                    'email' => 'john.doe@example.com',
                    'mobile_no' => '1234567890',
                    'class' => '12th',
                    'gender' => 'M',
                    'address' => '123 Main St',
                    'status' => 1,
                    'branch_id' => 1
                ]);

                    

        7.  UPDATE:
                (i) Retrieve the Record and Update Its Attributes

                        use App\Models\Student;

                        // Find the student by ID and update attributes
                        $student = Student::find(1);
                        $student->name = 'Jane Doe';
                        $student->email = 'jane.doe@example.com';
                        $student->mobile_no = '0987654321';
                        $student->save();


                (ii) If you want to update multiple records or use mass assignment, you can use the update method:

                        use App\Models\Student;

                        Student::where('id', 1)->update([
                            'name' => 'Jane Doe',
                            'email' => 'jane.doe@example.com',
                            'mobile_no' => '0987654321'
                        ]);


        8.  DELETE:

                (i) Find the Record and Delete It

                    use App\Models\Student;

                    // Find the student by ID and delete
                    $student = Student::find(1);
                    $student->delete();


                (ii) Delete by Conditions

                    use App\Models\Student;

                    // Delete students with a specific class
                    Student::where('class', '12th')->delete();


                (iii) Truncate: delete all records;

                        student::truncate()




20. One to One Relation:

    A one-to-one relationship in Laravel defines a relationship where a single instance of one model is associated with a single 
    instance of another model. For example, each user has one profile, and each profile belongs to one user.                 
    
    #Steps to Define a One-to-One Relationship

        (i).    Create Migrations and Models:

                php artisan make:model Member -m
                php artisan make:model Group -m

                Add Foreign key:
                    $table->unsignedBigInteger('group_id')->after('city');
                    $table->foreign('group_id')->references('group_id')->on('groups');

        (ii).   Define the Relationship in the Models:

                -Model: Memeber

                    public function getGroup()
                    {
                        return $this->hasOne('App\Models\Group','group_id', 'group_id');            //-- Imp. hasOne - ('Related Model Path', 'Foreign key', 'local key')
                    }

                - Model: Group

                    protected $primaryKey = 'group_id';
                    
                    public function member()
                    {
                        return $this->belongsTo(Member::class);                         // Optional
                    }


                NOte: Why belongsTo: - While hasOne and hasMany define the owner side of a relationship, belongsTo defines the child side. It tells Laravel that 
                                        this model is associated with another model via a foreign key.
                                        
                                     - Using belongsTo is not strictly optional, but it is highly recommended and necessary if you want to leverage Laravel's Eloquent ORM features to their full extent.


        (iii).  Retrieve and Save Related Data

                - Controller:

                    public function index()
                    {
                        echo "One to One relationship";
                        //return Member::all();
                        //return Member::find(1)->getGroup;           // to get any specific record
                        return Member::with('getGroup')->get();         // to get all records with record liked with group model

                    }


21. One to Many:
    In a one-to-many relationship, a single record in one table (the parent) is associated with multiple records in another table (the child). 
    For example, a Group can have many Members, but each Member belongs to only one Group.

    #Steps to Define a One-to-One Relationship

            (i).    Create Migrations and Models:

                    Same as one to one

            (ii).   Define the Relationship in the Models:



            - Model: Group

                protected $primaryKey = 'group_id';
                
                public function member()
                {
                    return $this->hasMany('App\Models\Member', 'group_id', 'group_id');     //-- Imp. hasmany - ('Related Model Path', 'Foreign key', 'local key')
                }


            -Model: Memeber

                    public function group()
                    {
                        return $this->belongsTo(Group::class);                         // Optional
                    }


            (iii).  Retrieve and Save Related Data

            - Controller:

                public function member()
                {
                    echo "One to Manay relationship";

                    return Group::with('member1')->get();

                }


22. Many to Many:
    In a many-to-many relationship, a record in one table can be associated with multiple records in another table and vice versa. 
    This is accomplished in Laravel using a pivot table, which is an intermediary table that holds the relationship between the two main tables.
    
    Example:

    Step 1. Create Models

                php artisan make:model Singer -m
                php artisan make:model Song     -m

    Step 2. 2. Define Relationships in Models
                Singer Model

                    public function songs()
                    {
                        return $this->belongsToMany(Song::class, 'singer_songs');
                    }

                Song Model
                    public function singers()
                    {
                        return $this->belongsToMany(Singer::class, 'singer_songs');
                    }

    Step 3. 3. Create Pivot Table Migration

            -   php artisan make:migration create_singer_songs_table

            -   Create Foreign key

                Schema::create('singer_songs', function (Blueprint $table) {
                    $table->id();
                    $table->foreignId('singer_id')->constrained()->onDelete('cascade');
                    $table->foreignId('song_id')->constrained()->onDelete('cascade');
                    $table->timestamps();
                });

            -   php artisan migrate

    Step 4. Define Routes

            use App\Http\Controllers\SingerController;

            Route::get('insert-singer', [SingerController::class, 'insert']);
            Route::get('show-songs/{id}', [SingerController::class, 'showSongs']);


    Step 5. Insert Data and Attach Relationships
            - Create Controller
                php artisan make:controller SingerController

            -   Insert - Attach and Fetch records 

                namespace App\Http\Controllers;

                use App\Models\Singer;
                use App\Models\Song;
                use Illuminate\Http\Request;

                class SingerController extends Controller
                {
                    public function insert()
                    {
                        $singer = new Singer;
                        $singer->name = "Udit Narayan";
                        $singer->save();

                        // Inserting into singer_songs pivot table
                        $song_ids = [1, 5];
                        $singer->songs()->attach($song_ids);
                    }

                    public function showSongs($id)
                    {
                        $singer = Singer::find($id);
                        
                        $varSongs = Singer::find($id)->songs;
                        return $varSongs;
                    }
                }
        
        Note: Attach: The attach method in Laravel is used to create associations between models in a many-to-many relationship through a pivot table. 
                        Here's a simple breakdown of what attach does:
                        When you have a many-to-many relationship between two models (e.g., Singer and Song), the attach method is used to insert records 
                        into the pivot table that holds the associations between these models.



    Step 6. Testing the Relationship

                - Insert Singer and Attach Songs: Access the route /insert-singer to create a singer and attach songs to the singer.
                - Show Songs for a Singer: Access the route /show-songs/{id} where {id} is the ID of the singer to see the songs related to that singer.



23. Many to Many - Detach 
    
    #   Detach:
                Purpose: Removes records from the pivot table. It deletes associations between the two models.

            Step 1:
                Singer Model

                    public function songs()
                    {
                        return $this->belongsToMany(Song::class, 'singer_songs');
                    }

                Song Model
                    public function singers()
                    {
                        return $this->belongsToMany(Singer::class, 'singer_songs');
                    }
            
            Step 2. Define Route

                    use App\Http\Controllers\SingerController;

                    Route::get('/detach-songs/{id}', [SingerController::class, 'detachSongs']);

            Step 3. Controller: SingerController

                    //Detach Songs by tacking Singer id from Pivot table "Singer_songs"
                        public function detachSongs($id){
                            $singer_id = Singer::find($id);

                            $song_ids = [1,5];
                            $singer_id->songs()->detach($song_ids);

                        }


24. Sync: 
        - Add and Remove: It adds new associations and removes any existing ones that are not in the provided list.
        - Replacement: The method replaces all existing associations with the new ones provided.
        - Preserves Data: You can also pass additional data for the pivot table if needed.

    - $singer->songs()->sync([2, 3]);


25. hasOneThrough:
    Scenario
        Consider the following scenario:
            -You have three models: Mechanic, Car, and Owner.
            -Each Mechanic services many Cars.
            -Each Car belongs to one Owner.
            -We want to define a hasOneThrough relationship so that we can access an "Owner through a Mechanic".
        
        Mechanic Model
            public function owner()
            {
                return $this->hasOneThrough(Owner::class, Car::class);
            }

        Car Model
            public function mechanic()
            {
                return $this->belongsTo(Mechanic::class);
            }

            public function owner()
            {
                return $this->belongsTo(Owner::class);
            }

        Owner Model
        public function car()
        {
            return $this->hasOne(Car::class);
        }



        Migration for Mechanics Table
        Schema::create('mechanics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Migration for Cars Table
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mechanic_id');
            $table->unsignedBigInteger('owner_id');
            $table->string('model');
            $table->timestamps();

            $table->foreign('mechanic_id')->references('id')->on('mechanics');          // Foreign key
            $table->foreign('owner_id')->references('id')->on('owners');                 // Foreign key
        });

        Migration for Owners Table
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        To fetch the owner of a car serviced by a specific mechanic, you can use the following code:        // -- IMP.

            $mechanic = Mechanic::find(1); // Find the mechanic by its ID
            $owner = $mechanic->owner; // Get the related owner through the car

            echo $owner->name; // Output the owner's name


    
26. hasManyThrough

        #Scenario
            -Each Mechanic services multiple Cars.
            -Each Car belongs to a single Owner.
            -We want to retrieve all the Owners serviced by a particular Mechanic.          // Case -- imp
            


27. use Illuminate\Support\Carbon;
    is an extension of the Carbon library, which provides a more fluent and human-readable interface for working with dates and times.

    use Illuminate\Support\Carbon;

    $now = Carbon::now();           //getting current date
    $nextWeek = $now->addWeek();
    echo $nextWeek->toDateTimeString();




28. Collections: 
    - A collection is a powerful utility class that provides an intuitive, fluent interface for working with arrays of data. Collections are part of the Illuminate\Support\Collection class and offer a wide range of methods that allow for efficient data manipulation and querying.

    - Key Features of Laravel Collections
    Chaining Methods: Collections are designed to be chainable, meaning you can call multiple methods in a single line to perform complex operations on your data.

    - Higher-order Messaging: Laravel collections support higher-order messaging, allowing you to call methods directly on the items within the collection.

    - Eloquent Integration: Collections are seamlessly integrated with Eloquent ORM, making it easy to work with database query results.
        eg: 

            $collection = collect([1, 2, 3, 4, 5]);

            // Or using the Collection class
            use Illuminate\Support\Collection;

            $collection = new Collection([1, 2, 3, 4, 5]);

    # Common Collection Methods

        1. all(): Get the underlying array represented by the collection.

            $allItems = $collection->all();

        2. map(): Apply a callback to each item in the collection.

            $squared = $collection->map(function ($item) {
                return $item * $item;
            });

        3. filter(): Filter items in the collection using a callback.

            $filtered = $collection->filter(function ($item) {
                return $item > 2;
            });
        
        4. reduce(): Reduce the collection to a single value.

            $sum = $collection->reduce(function ($carry, $item) {
                return $carry + $item;
            });

        5. sortBy(): Sort the collection by a given key.

            $sorted = $users->sortBy('name');

        6. groupBy(): Group the collection by a given key.

            $grouped = $users->groupBy('name');


            Example Usage
            Consider a scenario where you have a collection of users, and you want to filter out users who are not active, map the remaining users to get their names, and then sort the names alphabetically:

                $users = collect([
                    ['name' => 'John', 'email' => 'john@example.com', 'active' => true],
                    ['name' => 'Jane', 'email' => 'jane@example.com', 'active' => false],
                    ['name' => 'Doe', 'email' => 'doe@example.com', 'active' => true],
                ]);

                $activeUserNames = $users
                    ->filter(function ($user) {
                        return $user['active'];
                    })
                    ->map(function ($user) {
                        return $user['name'];
                    })
                    ->sort()
                    ->values();

                print_r($activeUserNames->all());



29. Understanding Code Syntax:

    public function get(Request $request, $transactionId)
    {
        $transaction = $this->transactionsService->getTransactionById($transactionId, ['attributes']);

        abort_unless(
            $transaction instanceof Transaction && (
                $transaction->customer_id === optional($request->user())->id ||
                optional($transaction->order)->customer_id === optional($request->user())->id
            ),
            Response::HTTP_FORBIDDEN
        );

        return new TransactionResource($transaction);
    }

    Explaination:
    public function get(Request $request, $transactionId):

    - public function get(...) defines a public method named get.
        - Request $request indicates that the method expects an instance of the Request class (from Laravel) as the first parameter, which contains information about the HTTP request.
        - $transactionId is the second parameter, which corresponds to the {transactionId} route parameter.

    - $transaction = $this->transactionsService->getTransactionById($transactionId, ['attributes']);:
        - $transaction is a variable that stores the result of calling the getTransactionById method.
        - $this->transactionsService indicates that the getTransactionById method is being called on the transactionsService property of the current object ($this).
        - getTransactionById($transactionId, ['attributes']) is a method call where $transactionId is passed as the first argument, and ['attributes'] as the second argument (which could be an array specifying additional data to load).


30. Traits:

    Traits are a feature in PHP that allow you to reuse methods across different classes without requiring inheritance. In Laravel, traits are often used to encapsulate and share functionality between multiple classes, making the code more modular and reusable.

    How Traits Work:
        Definition: A trait is defined using the trait keyword in PHP. It can contain methods and properties.
        Usage: You can include a trait in a class using the use keyword. This effectively copies the methods and properties from the trait into the class.


31. Observers:

    - Definition: Observers in Laravel are classes that listen to events fired by Eloquent models during their lifecycle (e.g., creating, updating, deleting).

    - Purpose: They help to cleanly handle logic that should occur when certain actions happen on a model, keeping the controller and model code clean.

    - Common Methods: Observers commonly use methods like created, updated, deleted, restored, saving, saved, deleting, and more.

    - Registration: Observers must be registered in a service provider, typically AppServiceProvider, using the observe() method on the model.

    - Example Use Cases: Logging changes, sending notifications, updating related data, etc.

    - Here are the simple steps to create and use Observers in Laravel:

        ### 1. **Create the Observer**
        - You can create an observer using an artisan command:
            ```bash
            php artisan make:observer UserObserver --model=User
            ```
        - This will create an `UserObserver` class in the `App\Observers` directory and automatically link it to the `User` model.

        ### 2. **Define Observer Methods**
        - Open the created observer file (`app/Observers/UserObserver.php`).
        - Add methods corresponding to the model events you want to listen to, such as `created`, `updated`, `deleted`, etc.
        - Example:
            ```php
            namespace App\Observers;

            use App\Models\User;

            class UserObserver
            {
                public function created(User $user)
                {
                    // Logic to run after a user is created
                }

                public function updated(User $user)
                {
                    // Logic to run after a user is updated
                }
            }
            ```

        ### 3. **Register the Observer**
        - You need to register your observer so that Laravel knows to use it.
        - Open `AppServiceProvider` (`app/Providers/AppServiceProvider.php`) and add the observer in the `boot` method:
            ```php
            use App\Models\User;
            use App\Observers\UserObserver;

            public function boot()
            {
                User::observe(UserObserver::class);
            }
            ```

        ### 4. **Test the Observer**
        - Perform actions on the model (like creating or updating a user) to trigger the observer methods.

        ### 5. **Optional: Customizing Observer Methods**
        - You can define custom logic in your observer methods based on your requirements.

        ### **Summary of Steps**:
        1. Create an observer using `php artisan make:observer`.
        2. Define the methods in the observer class for events you want to handle.
        3. Register the observer in the `AppServiceProvider`.
        4. Test the observer by performing actions on the model.


32. Some Common laravel Commads
        - php artisan optimize      : clean cache and other things


33. Event Listners
                
    Event listeners in Laravel provide a powerful way to decouple various parts of your application. They allow you to listen for specific events and execute code in response, which can be useful for handling background processes, logging, notifications, and more.
    **Real-World Example**

        Let's say you want to perform multiple actions when a new user registers, such as sending a welcome email, logging the registration, and updating a user count.

        **Laravel Approach:**

        1. **Define multiple listeners**:

        - `SendWelcomeEmail`
        - `LogRegistration`
        - `UpdateUserCount`

        2. **Event Class**:

        ```php
        class UserRegistered
        {
            // Same as before
        }
        ```

        3. **Listeners**:

        Each listener handles a specific task:

        ```php
        // SendWelcomeEmail
        class SendWelcomeEmail
        {
            public function handle(UserRegistered $event)
            {
                // Send email
            }
        }

        // LogRegistration
        class LogRegistration
        {
            public function handle(UserRegistered $event)
            {
                // Log registration
            }
        }

        // UpdateUserCount
        class UpdateUserCount
        {
            public function handle(UserRegistered $event)
            {
                // Update count
            }
        }
        ```

        4. **Register in `EventServiceProvider`**:

        ```php
        protected $listen = [
            \App\Events\UserRegistered::class => [
                \App\Listeners\SendWelcomeEmail::class,
                \App\Listeners\LogRegistration::class,
                \App\Listeners\UpdateUserCount::class,
            ],
        ];
        ```

        5. **Dispatch the Event**:

        ```php
        event(new \App\Events\UserRegistered($user));
        ```

        In summary, Laravel’s event system simplifies managing actions that need to occur in response to certain events, leading to more maintainable and organized code compared to manually handling events in traditional PHP.


34.     $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        
Note:   - Model : Singular with first letter capital. eg: User
        - Table name: Corresponding to model name - table name should be plural and small letters: eg: users, groups, students, etc.
        - Migration: Pluran with all letter small. eg: 2024_07_30_014804_create_students_table

        - On which function use (), when it is calling



        Laravel has a set of naming conventions that help maintain consistency and readability across the codebase. Following these conventions makes it easier for developers to understand and collaborate on Laravel projects.

            - Classes
                Class names are written in StudlyCase.
                Example: User, ProductController, OrderService.
                Variables

            - Variables are written in camelCase.
                Example: $userName, $orderTotal.
                Methods

            - Method names are written in camelCase.
                Example: getUserName(), calculateTotal().
                Constants

            - Constants are written in UPPERCASE.
                Example: MAX_ATTEMPTS, DEFAULT_LANGUAGE.
                Specific Laravel Conventions
                Controllers

            - Controller class names are written in StudlyCase and usually suffixed with Controller.
                Example: UserController, ProductController.
                Models

            - Model class names are written in StudlyCase and are usually singular.
                Example: User, Product.
                Migrations

            - Migration class names are written in StudlyCase.
                File names are prefixed with a timestamp and written in snake_case.
                Example: 2024_07_30_000000_create_users_table, 2024_07_30_000001_add_email_to_users_table.
                Routes

            - Routes are written in snake_case and should use a consistent naming pattern.
                Example: 'user.profile', 'order.history'.
                Views

            - View files are written in snake_case.
                Example: welcome.blade.php, user_profile.blade.php.
                Blade Directives

            - Blade directives like @section and @yield use snake_case.
                Example: @section('content'), @yield('content').
                Database Tables

            - Table names are written in snake_case and are usually plural.
                Example: users, products. 
                Pivot Tables

            - Pivot table names are written in snake_case, combining the two related model names in alphabetical order.
                Example: product_user, role_user.

