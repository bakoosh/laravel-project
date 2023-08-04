<?php




use Illuminate\Support\Facades\Route;

//Главная
use App\Http\Controllers\Main\Comment\CommentController;
use App\Http\Controllers\Main\Post\PostController;

//Админка
use App\Http\Controllers\Admin\Category\ADMCategoryController;
use App\Http\Controllers\Admin\Main\ADMMainController;
use App\Http\Controllers\Admin\Post\ADMPostController;
use App\Http\Controllers\Admin\Tag\ADMTagController;
use App\Http\Controllers\Admin\User\ADMUserController;

//Личный кабинет пользователя
use App\Http\Controllers\Personal\Comment\PersonalCommentController;
use App\Http\Controllers\Personal\Main\PersonalMainController;

// Вывод категориев и постов по категориям
use App\Http\Controllers\Category\CategoryPostController;
use App\Http\Controllers\Category\CategoryController;



Route::get('/', function () {
    return redirect()->route('post.index');
});


// Главная
Route::prefix('main')->group(function (){
    Route::controller(PostController::class)->group(function (){
        Route::get('/','index')->name('post.index');
        Route::get('/{post}','show')->name('post.show');

        Route::prefix('{post}/comments')->middleware('auth')->controller(CommentController::class)->group(function (){
            Route::post('/','store')->name('post.comment.store');
        });
    });
});

//Вывод категориев и постов по категориям
Route::prefix('categories')->group(function (){
    Route::prefix('/')->controller(CategoryController::class)->group(function (){
        Route::get('/','index')->name('category.index');
    });
    Route::prefix('{category}')->controller(CategoryPostController::class)->group(function (){
        Route::get('/','index')->name('category.post.index');
    });
});



//  Личный кабинет пользователя
Route::prefix('personal')->middleware('auth')->group(function (){
   Route::controller(PersonalMainController::class)->prefix('main')->group(function (){
      Route::get('/','index')->name('personal.main.index');;
   });
    Route::controller(PersonalCommentController::class)->prefix('comments')->group(function (){
        Route::get('/','index')->name('personal.comment.index');
        Route::get('/{comment}/edit','edit')->name('personal.comment.edit');
        Route::patch('/{comment}','update')->name('personal.comment.update');
        Route::delete('/{comment}','delete')->name('personal.comment.delete');
    });
});



//  Админка
Route::prefix('admin')->middleware(['auth','admin'])->group(function (){

    Route::controller(ADMMainController::class)->group(function (){
        Route::get('/','index')->name('admin.main.index');
    });


   Route::controller(ADMCategoryController::class)->prefix('categories')->group(function (){
       Route::get('/','index')->name('admin.category.index');
       Route::get('/create','create')->name('admin.category.create');
       Route::post('/','store')->name('admin.category.store');
       Route::get('/{category}','show')->name('admin.category.show');
       Route::get('/{category}/edit','edit')->name('admin.category.edit');
       Route::patch('/{category}','update')->name('admin.category.update');
       Route::delete('/{category}','delete')->name('admin.category.delete');
   });


    Route::controller(ADMTagController::class)->prefix('tags')->group(function (){
        Route::get('/','index')->name('admin.tag.index');
        Route::get('/create','create')->name('admin.tag.create');
        Route::post('/','store')->name('admin.tag.store');
        Route::get('/{tag}','show')->name('admin.tag.show');
        Route::get('/{tag}/edit','edit')->name('admin.tag.edit');
        Route::patch('/{tag}','update')->name('admin.tag.update');
        Route::delete('/{tag}','delete')->name('admin.tag.delete');
    });


    Route::controller(ADMPostController::class)->prefix('posts')->group(function (){
        Route::get('/','index')->name('admin.post.index');
        Route::get('/create','create')->name('admin.post.create');
        Route::post('/','store')->name('admin.post.store');
        Route::get('/{post}','show')->name('admin.post.show');
        Route::get('/{post}/edit','edit')->name('admin.post.edit');
        Route::patch('/{post}','update')->name('admin.post.update');
        Route::delete('/{post}','delete')->name('admin.post.delete');
    });


    Route::controller(ADMUserController::class)->prefix('users')->group(function (){
        Route::get('/','index')->name('admin.user.index');
        Route::get('/create','create')->name('admin.user.create');
        Route::post('/','store')->name('admin.user.store');
        Route::get('/{user}','show')->name('admin.user.show');
        Route::get('/{user}/edit','edit')->name('admin.user.edit');
        Route::patch('/{user}','update')->name('admin.user.update');
        Route::delete('/{user}','delete')->name('admin.user.delete');
    });



});
Auth::routes();




