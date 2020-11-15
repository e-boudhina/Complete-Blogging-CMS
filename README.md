<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# About This Laravel Project:  
 
* php artisan --version 
=> Laravel Framework 8.12.3

This is a blog platforme that allows a user to authenticate, create posts with a thumbnails, the blog contains posts which are composed of :<br>
An id | A title | A slug to use instead of the 'id' parameter for clear meaning and for search queries | The content( body of post)| A category ID |The post image (nameed 'featured').

* Users must first register in order to get access and then perform C.R.U.D operations.
* 6 posts must be created for the blog to work without errors. 

To load a a default user and load basic settings run:
* php artisan migrate --seed 
   
## This project uses the following external libraries: 

* https://github.com/CodeSeven/toastr for displaying session messages. 

* https://summernote.org/ summernote editor to edit post body.

* https://github.com/spatie/laravel-newsletter which provides an easy way to integrate MailChimp with Laravel.

To Sign-up for a Mailchilp account visit:
* https://mailchimp.com/

Blog Routes:

* php artisan route:list


| Domain | Method    | URI                            | Name             | Action                                                                 | Middleware |
|--------|-----------|--------------------------------|------------------|------------------------------------------------------------------------|------------|
|        | GET|HEAD  | /                              | main             | App\Http\Controllers\FrontEndController@index                          | web        |
|        | POST      | admin/category                 | category.store   | App\Http\Controllers\CategoriesController@store                        | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/category                 | category.index   | App\Http\Controllers\CategoriesController@index                        | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/category/create          | category.create  | App\Http\Controllers\CategoriesController@create                       | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | DELETE    | admin/category/{category}      | category.destroy | App\Http\Controllers\CategoriesController@destroy                      | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | PUT|PATCH | admin/category/{category}      | category.update  | App\Http\Controllers\CategoriesController@update                       | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/category/{category}      | category.show    | App\Http\Controllers\CategoriesController@show                         | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/category/{category}/edit | category.edit    | App\Http\Controllers\CategoriesController@edit                         | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/dashboard                | home             | App\Http\Controllers\HomeController@index                              | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | POST      | admin/post                     | post.store       | App\Http\Controllers\PostsController@store                             | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/post                     | post.index       | App\Http\Controllers\PostsController@index                             | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/post/create              | post.create      | App\Http\Controllers\PostsController@create                            | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/post/restore/{post}      | post.restore     | App\Http\Controllers\PostsController@restore                           | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/post/trashed             | post.trashed     | App\Http\Controllers\PostsController@trashed                           | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/post/{post}              | post.show        | App\Http\Controllers\PostsController@show                              | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | DELETE    | admin/post/{post}              | post.destroy     | App\Http\Controllers\PostsController@destroy                           | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | PUT|PATCH | admin/post/{post}              | post.update      | App\Http\Controllers\PostsController@update                            | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/post/{post}/edit         | post.edit        | App\Http\Controllers\PostsController@edit                              | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | POST      | admin/profile                  | profile.store    | App\Http\Controllers\ProfilesController@store                          | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/profile                  | profile.index    | App\Http\Controllers\ProfilesController@index                          | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/profile/create           | profile.create   | App\Http\Controllers\ProfilesController@create                         | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/profile/{profile}        | profile.show     | App\Http\Controllers\ProfilesController@show                           | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | DELETE    | admin/profile/{profile}        | profile.destroy  | App\Http\Controllers\ProfilesController@destroy                        | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | PUT|PATCH | admin/profile/{profile}        | profile.update   | App\Http\Controllers\ProfilesController@update                         | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/profile/{profile}/edit   | profile.edit     | App\Http\Controllers\ProfilesController@edit                           | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/settings                 | settings.index   | App\Http\Controllers\SettingsController@index                          | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | POST      | admin/settings/update          | settings.update  | App\Http\Controllers\SettingsController@update                         | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | POST      | admin/tag                      | tag.store        | App\Http\Controllers\TagsController@store                              | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/tag                      | tag.index        | App\Http\Controllers\TagsController@index                              | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/tag/create               | tag.create       | App\Http\Controllers\TagsController@create                             | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | DELETE    | admin/tag/{tag}                | tag.destroy      | App\Http\Controllers\TagsController@destroy                            | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | PUT|PATCH | admin/tag/{tag}                | tag.update       | App\Http\Controllers\TagsController@update                             | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/tag/{tag}                | tag.show         | App\Http\Controllers\TagsController@show                               | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | GET|HEAD  | admin/tag/{tag}/edit           | tag.edit         | App\Http\Controllers\TagsController@edit                               | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | POST      | admin/user                     | user.store       | App\Http\Controllers\UsersController@store                             | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | GET|HEAD  | admin/user                     | user.index       | App\Http\Controllers\UsersController@index                             | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | GET|HEAD  | admin/user/create              | user.create      | App\Http\Controllers\UsersController@create                            | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | GET|HEAD  | admin/user/makeAdmin/{user}    | user.admin       | App\Http\Controllers\UsersController@admin                             | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | GET|HEAD  | admin/user/makeDefault/{user}  | user.revoke      | App\Http\Controllers\UsersController@revoke                            | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | DELETE    | admin/user/{user}              | user.destroy     | App\Http\Controllers\UsersController@destroy                           | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | PUT|PATCH | admin/user/{user}              | user.update      | App\Http\Controllers\UsersController@update                            | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | GET|HEAD  | admin/user/{user}              | user.show        | App\Http\Controllers\UsersController@show                              | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | GET|HEAD  | admin/user/{user}/edit         | user.edit        | App\Http\Controllers\UsersController@edit                              | web        |
|        |           |                                |                  |                                                                        | auth       |
|        |           |                                |                  |                                                                        | admin      |
|        | GET|HEAD  | api/user                       |                  | Closure                                                                | api        |
|        |           |                                |                  |                                                                        | auth:api   |
|        | GET|HEAD  | category/{category}            | category.single  | App\Http\Controllers\FrontEndController@category                       | web        |
|        | POST      | login                          |                  | App\Http\Controllers\Auth\LoginController@login                        | web        |
|        |           |                                |                  |                                                                        | guest      |
|        | GET|HEAD  | login                          | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web        |
|        |           |                                |                  |                                                                        | guest      |
|        | POST      | logout                         | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web        |
|        | GET|HEAD  | password/confirm               | password.confirm | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm    | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | POST      | password/confirm               |                  | App\Http\Controllers\Auth\ConfirmPasswordController@confirm            | web        |
|        |           |                                |                  |                                                                        | auth       |
|        | POST      | password/email                 | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web        |
|        | POST      | password/reset                 | password.update  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web        |
|        | GET|HEAD  | password/reset                 | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web        |
|        | GET|HEAD  | password/reset/{token}         | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web        |
|        | GET|HEAD  | post/{slug}                    | post.single      | App\Http\Controllers\FrontEndController@singlePost                     | web        |
|        | POST      | register                       |                  | App\Http\Controllers\Auth\RegisterController@register                  | web        |
|        |           |                                |                  |                                                                        | guest      |
|        | GET|HEAD  | register                       | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web        |
|        |           |                                |                  |                                                                        | guest      |
|        | GET|HEAD  | search                         | search           | App\Http\Controllers\FrontEndController@search                         | web        |
|        | POST      | subscribe                      | subscribe        | App\Http\Controllers\FrontEndController@subscribe                      | web        |
|        | GET|HEAD  | tag/{tag}                      | tag.single       | App\Http\Controllers\FrontEndController@tag                            | web        |
