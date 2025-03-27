# laravel_product_crud


<h1>Project Setup Steps</h1>
<ul>
    <li>Download code from github.</li>
    <li>Install composer into the project.</li>
    <li>Create the .env file.</li>
    <li>Copy the code of .env.example file and paste into .env file.</li>
    <li>Create datebase into the mysql and put the same database name into the .env file "DB_DATABASE='your_database_name'".</li>
    <li>Create APP_KEY by running command "php artisan key:generate" now it will showing in your .env file "APP_KEY=base..."</li>
    <li>Run migrations and seeders with command "php artisan migrate --seed".</li>
    <li>Run command "npm install" for vite dependencies.</li>
    <li>Run command "php artisan storage:link"</li>
    <li>Run command "npm run build" for production build.</li>
    <li>All set...</li>
</ul>

<h1>Project View</h1>

<h3>1. User Role </h3>
<ul>
<li>Super Admin</li>
<li>Admin</li>
<li>Staff</li>
</ul>


<h3>
   2. Users are added directly with seeder.
</h3>
<h3>
   3. Tables are build with migrations.
</h3>

<h3>
   4. Theme color are change according to the user role.
</h3>
<p># Admin and Super Admin theme color are dark.</p>

![image](https://github.com/user-attachments/assets/fd5e4290-d5ba-4cfc-9d8a-f9694f983d41)
    
<p># Staff theme color are light.</p>

![image](https://github.com/user-attachments/assets/998c222d-2163-4037-9f1c-7473e37ce842)


<h3>
5. Admin and Super Admin can view,create,update or delete the products
</h3>
<h3>
6. Staff can view and create the products.
</h3>
<h3>
7. Before save the product (product image) can crop or manage by the user.
</h3>

<h3>
8. User can also upload products directly with excel file.
</h3>
<h3>
9. If any duplicate products in the excel this will skip and unique products are inserted. .
</h3>
<h3>
10. Skip products are automatically downloaded into excel file .
</h3>

<h1>Login Credentials</h1>
<ul>
<li>Supper admin <br> username : superadmin@gmail.com <br>password : super@123</li>
<li>Admin <br> username : admin@gmail.com <br>password : admin@123</li>
<li>Staff <br> username : staff@gmail.com <br>password : staff@123</li>
</ul>


