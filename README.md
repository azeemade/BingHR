# BingHR Dashboard

This is a dashboard which allows users to perform basic CRUD operations.

## Installation

```bash
git clone https://github.com/azeemade/BingHR.git
```

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan migrate —-seed
```

```bash
php artisan serve
```

## Overview  

1. Created a controller to execute each of the CRUD operations. 

2. Created route which links the Controller to the Blade template for easy operation.

3. Installation and configuration  of the spatie/Laravel-permission package to aid the implementation of user roles and permissions.

```bash

composer require spatie/laravel-permission

```

4. Installation of tailwindCSS and tailwindCSS Elements packages to make user interface styling and interaction swifter.

5. Built the major components(includes) of the project i.e. sidebar, collapsible sidebar menu, navbar, users list and the modals adhering strictly to the provided design frames. 

6. Connected the users list section to the controller. This populates the list/table with all user details. 

7. Connected the action buttons. This makes them able to perform their specified tasks.

6. The edit button (pencil icon) opens a modal to update user details and returns an alert for successful or failed operation. The modal is populated with the selected user details so as to make adjustments possible. The modal is a Laravel component which make it possible for data to be passed from the parent view to the modal. 

```bash
. . .
<x-modal :user=“$user”></x-modal>
. . .
```

7. The delete button removes the selected user data from the list and also return an alert for successful or failed operation. 

9. An add button is above the users list that opens a modal for the creation of new user. This modal is an include component which allows user to perform the create operation and redirects to the index page after submission. 

```bash
. . .
@include(“includes.modal”)
. . .
```

## Note

Due to time limitations, some deliverables were not fully implemented. e.g. Permissions sections. But if given more time, they will be fully functional. 
