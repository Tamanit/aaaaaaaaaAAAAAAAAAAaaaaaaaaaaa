# API Documentation

## Project: laravel/laravel

Laravel Version: v12.16.0

Generated: 6/2/2025, 8:41:19 AM

## Table of Contents

- [auth](#auth)
- [web](#web)

## auth

| Method | Endpoint | Handler | Description |
|--------|----------|---------|-------------|
| GET | register | RegisteredUserController::class, 'create' | List register |
| POST | register | RegisteredUserController::class, 'store' | Create a new register |
| GET | login | AuthenticatedSessionController::class, 'create' | List login |
| POST | login | AuthenticatedSessionController::class, 'store' | Create a new login |
| GET | forgot-password | PasswordResetLinkController::class, 'create' | List forgot-password |
| POST | forgot-password | PasswordResetLinkController::class, 'store' | Create a new forgot-password |
| GET | reset-password/{token} | NewPasswordController::class, 'create' | Retrieve a specific {token} |
| POST | reset-password | NewPasswordController::class, 'store' | Create a new reset-password |
| GET | verify-email | EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1' | List verify-email |
| POST | email/verification-notification | EmailVerificationNotificationController::class, 'store' | Create a new verification-notification |
| GET | confirm-password | ConfirmablePasswordController::class, 'show' | List confirm-password |
| POST | confirm-password | ConfirmablePasswordController::class, 'store' | Create a new confirm-password |
| PUT | password | PasswordController::class, 'update' | Update a specific password |
| POST | logout | AuthenticatedSessionController::class, 'destroy' | Create a new logout |

### GET register

**Handler:** RegisteredUserController::class, 'create'

**Description:** List register

---

### POST register

**Handler:** RegisteredUserController::class, 'store'

**Description:** Create a new register

---

### GET login

**Handler:** AuthenticatedSessionController::class, 'create'

**Description:** List login

---

### POST login

**Handler:** AuthenticatedSessionController::class, 'store'

**Description:** Create a new login

---

### GET forgot-password

**Handler:** PasswordResetLinkController::class, 'create'

**Description:** List forgot-password

---

### POST forgot-password

**Handler:** PasswordResetLinkController::class, 'store'

**Description:** Create a new forgot-password

---

### GET reset-password/{token}

**Handler:** NewPasswordController::class, 'create'

**Description:** Retrieve a specific {token}

---

### POST reset-password

**Handler:** NewPasswordController::class, 'store'

**Description:** Create a new reset-password

---

### GET verify-email

**Handler:** EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'

**Description:** List verify-email

---

### POST email/verification-notification

**Handler:** EmailVerificationNotificationController::class, 'store'

**Description:** Create a new verification-notification

---

### GET confirm-password

**Handler:** ConfirmablePasswordController::class, 'show'

**Description:** List confirm-password

---

### POST confirm-password

**Handler:** ConfirmablePasswordController::class, 'store'

**Description:** Create a new confirm-password

---

### PUT password

**Handler:** PasswordController::class, 'update'

**Description:** Update a specific password

---

### POST logout

**Handler:** AuthenticatedSessionController::class, 'destroy'

**Description:** Create a new logout

---

## web

| Method | Endpoint | Handler | Description |
|--------|----------|---------|-------------|
| GET | / | function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//     | List resource |
| GET | /dashboard | function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified' | List dashboard |
| GET | /managerRent | function () {
//    return Inertia::render('managerLk/ManagerRent');
//})->name('managerRent');
//
//Route::get('/managerReq', function () {
//    return Inertia::render('managerLk/ManagerReq');
//})->name('managerReq');
//
//Route::get('/managerCreateAct', function () {
//    return Inertia::render('managerLk/ManagerCreateAct');
//})->name('managerCreateAct');
//
//Route::get('/managerOrganisation', function () {
//    return Inertia::render('managerLk/ManagerOrganisation');
//})->name('managerOrganisation');
//
//Route::get('/rentUnitDetail', function () {
//    return Inertia::render('rentLk/RentUnitDetail');
//})->name('rentUnitDetail');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit' | List managerRent |
| PATCH | /profile | ProfileController::class, 'update' | Update a specific profile |
| DELETE | /profile | ProfileController::class, 'destroy' | Delete a specific profile |
| GET | test | function () {
    dd(
       str_replace('\\', '?', \App\Models\User::class)
    );
});

//});
 | List test |

### GET /

**Handler:** function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    

**Description:** List resource

---

### GET /dashboard

**Handler:** function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'

**Description:** List dashboard

---

### GET /managerRent

**Handler:** function () {
//    return Inertia::render('managerLk/ManagerRent');
//})->name('managerRent');
//
//Route::get('/managerReq', function () {
//    return Inertia::render('managerLk/ManagerReq');
//})->name('managerReq');
//
//Route::get('/managerCreateAct', function () {
//    return Inertia::render('managerLk/ManagerCreateAct');
//})->name('managerCreateAct');
//
//Route::get('/managerOrganisation', function () {
//    return Inertia::render('managerLk/ManagerOrganisation');
//})->name('managerOrganisation');
//
//Route::get('/rentUnitDetail', function () {
//    return Inertia::render('rentLk/RentUnitDetail');
//})->name('rentUnitDetail');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'

**Description:** List managerRent

---

### PATCH /profile

**Handler:** ProfileController::class, 'update'

**Description:** Update a specific profile

---

### DELETE /profile

**Handler:** ProfileController::class, 'destroy'

**Description:** Delete a specific profile

---

### GET test

**Handler:** function () {
    dd(
       str_replace('\\', '?', \App\Models\User::class)
    );
});

//});


**Description:** List test

---

