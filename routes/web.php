<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectimageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VideoController;
use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Projectimage;
use App\Models\Slider;
use App\Models\Visitor;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $publicIP = file_get_contents('https://api.ipify.org/');

    $visitor = new Visitor;
    $visitor['ip'] = $publicIP;
    $visitor->save();

    $projects = Project::all();
    $project1 = Project::where('priority', 3)->first();
    $project2 = Project::where('priority', 2)->first();
    $project3 = Project::where('priority', 1)->first();

    $categories = Category::all();
    $about = About::all();
    $contact = Contact::all();
    $slider = Slider::orderBy('position', 'asc')->where('status', 1)->latest('created_at')->get();

    return view('welcome', compact(
        'projects',
        'slider',
        'about',
        'contact',
        'project3',
        'project2',
        'project1',
        'categories'
    ));
});
Route::get('/catgorywise-project/{id}', [FrontendController::class, 'catProject'])->name('cat-project');
Route::get('/project_details/{id}', [FrontendController::class, 'projectDetails'])->name('projectDetails');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::get('/dashboard', function () {
    $categories = Category::all();
    $projects = Project::all();
    $sliders = Slider::all();
    $projectimages = Projectimage::all();

    // return($year_visitor);
    $current_week = Visitor::whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::TUESDAY), Carbon::now()->endOfWeek(Carbon::MONDAY)])->get()->count();
    // return $current_week;
    $total = Visitor::get()->count();

    return view('dashboard', compact('categories', 'projects', 'sliders', 'projectimages'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/project-card', function () {
    return view('admin.project.projectsCard');
})->middleware(['auth', 'verified'])->name('project.card');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('projects', ProjectController::class);
    // Route::get('/project-details/{id}',[ProjectController::class,'details'])->name('project.details');
    Route::resource('categories', CategoryController::class);
    Route::resource('projectimage', ProjectimageController::class);
    Route::resource('sliders', SliderController::class);
    // Route::get('/status/{id}',[SliderController::class,'status'])->name('sliders.status');
    Route::get('/about_info', [OtherController::class, 'about'])->name('about.index');
    Route::post('/about/update/{id}', [OtherController::class, 'aboutUpdate'])->name('about.update');
    Route::get('/contact_info', [OtherController::class, 'contact'])->name('contact.index');
    Route::post('/contact/update/{id}', [OtherController::class, 'contactUpdate'])->name('contact.update');

    Route::get('/add_new_image/{id}', [ProjectimageController::class, 'index'])->name('addimage');
    Route::post('/create_new_image', [ProjectimageController::class, 'create'])->name('createimage');

    Route::get('/video', [VideoController::class, 'index'])->name('videos.index');
    Route::get('/create_video', [VideoController::class, 'create'])->name('videos.create');
    Route::get('/store_video', [VideoController::class, 'store'])->name('videos.store');

    Route::get('/update-slider-status', [SliderController::class, 'updateStatus'])->name('videos.store');
    Route::post('/update-position/{id}', [SliderController::class, 'updatePosition']);
    Route::post('/update-status/{id}', [SliderController::class, 'updateStatus']);
});

require __DIR__.'/auth.php';
