<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ValidationLabController;
use App\Http\Controllers\DemoBladeController;
use App\Http\Controllers\XSSLabController;

// ================================================================
// HOME
// ================================================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ================================================================
// VALIDATION LAB ROUTES
// ================================================================
Route::prefix('validation-lab')->name('validation-lab.')->group(function () {
    // Index - Menu Lab
    Route::get('/', [ValidationLabController::class, 'index'])
        ->name('index');

    // ----- VULNERABLE FORM -----
    // Form tanpa server-side validation
    Route::get('/vulnerable', [ValidationLabController::class, 'vulnerableForm'])
        ->name('vulnerable');
    Route::post('/vulnerable', [ValidationLabController::class, 'vulnerableSubmit'])
        ->name('vulnerable.submit');
    Route::post('/vulnerable/clear', [ValidationLabController::class, 'vulnerableClear'])
        ->name('vulnerable.clear');

    // ----- SECURE FORM -----
    // Form dengan server-side validation
    Route::get('/secure', [ValidationLabController::class, 'secureForm'])
        ->name('secure');
    Route::post('/secure', [ValidationLabController::class, 'secureSubmit'])
        ->name('secure.submit');
    Route::post('/secure/clear', [ValidationLabController::class, 'secureClear'])
        ->name('secure.clear');
});

// ================================================================
// TICKET CRUD ROUTES
// ================================================================
// Menggunakan Resource Controller dengan Form Request validation
Route::resource('tickets', TicketController::class);

// ================================================================
// PLACEHOLDER ROUTES (Coming Soon)
// ================================================================
$comingSoon = function () {
    return redirect()->route('home')->with('error', 'Fitur ini segera datang (Coming Soon)! Sedang dalam pengembangan untuk materi hari berikutnya.');
};

Route::prefix('security-testing')->name('security-testing.')->group(function () use ($comingSoon) {
    Route::get('/', $comingSoon)->name('index');
    Route::get('/xss', $comingSoon)->name('xss');
    Route::get('/csrf', $comingSoon)->name('csrf');
    Route::get('/headers', $comingSoon)->name('headers');
    Route::get('/audit', $comingSoon)->name('audit');
});

// =========================================
// DEMO BLADE TEMPLATING
// =========================================
Route::prefix('demo-blade')->name('demo-blade.')->group(function () {
    Route::get('/', [DemoBladeController::class, 'index'])->name('index');
    Route::get('/directives', [DemoBladeController::class, 'directives'])->name('directives');
    Route::get('/components', [DemoBladeController::class, 'components'])->name('components');
    Route::get('/includes', [DemoBladeController::class, 'includes'])->name('includes');
    Route::get('/stacks', [DemoBladeController::class, 'stacks'])->name('stacks');
});

// =========================================
// XSS LAB - VULNERABLE & SECURE
// =========================================
Route::prefix('xss-lab')->name('xss-lab.')->group(function () {
    Route::get('/', [XSSLabController::class, 'index'])->name('index');
    
    // Reset comments untuk demo ulang
    Route::post('/reset-comments', [XSSLabController::class, 'resetComments'])->name('reset-comments');
    
    // Reflected XSS
    Route::get('/reflected/vulnerable', [XSSLabController::class, 'reflectedVulnerable'])
        ->name('reflected.vulnerable');
    Route::get('/reflected/secure', [XSSLabController::class, 'reflectedSecure'])
        ->name('reflected.secure');
    
    // Stored XSS
    Route::get('/stored/vulnerable', [XSSLabController::class, 'storedVulnerable'])
        ->name('stored.vulnerable');
    Route::post('/stored/vulnerable', [XSSLabController::class, 'storedVulnerableStore'])
        ->name('stored.vulnerable.store');
    
    Route::get('/stored/secure', [XSSLabController::class, 'storedSecure'])
        ->name('stored.secure');
    Route::post('/stored/secure', [XSSLabController::class, 'storedSecureStore'])
        ->name('stored.secure.store');
    
    // DOM-Based XSS
    Route::get('/dom/vulnerable', [XSSLabController::class, 'domVulnerable'])
        ->name('dom.vulnerable');
    Route::get('/dom/secure', [XSSLabController::class, 'domSecure'])
        ->name('dom.secure');
});

// ================================================================
// API DEMO
// ================================================================
Route::prefix('api')->group(function () {
    Route::post('/vulnerable-submit', [ValidationLabController::class, 'apiVulnerable'])
        ->withoutMiddleware(['web']);
});
