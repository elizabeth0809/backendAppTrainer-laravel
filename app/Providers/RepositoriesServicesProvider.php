<?php

namespace App\Providers;

use App\Interfaces\Auth\IAuthRepository;
use App\Interfaces\Auth\IAuthServices;
use App\Interfaces\Exercise\IExerciseRepository;
use App\Interfaces\Exercise\IExerciseServices;
use App\Interfaces\ObjetiveExercise\IObjetiveExerciseRepository;
use App\Interfaces\ObjetiveExercise\IObjetiveExerciseServices;
use App\Interfaces\OpeningSchedule\IOpeningScheduleRepository;
use App\Interfaces\OpeningSchedule\IOpeningScheduleServices;
use App\Interfaces\SchedulingExercise\ISchedulingExerciseRepository;
use App\Interfaces\SchedulingExercise\ISchedulingExerciseServices;
use App\Interfaces\Subscription\ISubscriptionRepository;
use App\Interfaces\Subscription\ISubscriptionServices;
use App\Interfaces\User\IUserRepository;
use App\Interfaces\User\IUserServices;
use App\Interfaces\UserMeasurement\IUserMeasurementRepository;
use App\Interfaces\UserMeasurement\IUserMeasurementServices;
use App\Repository\Auth\AuthRepository;
use App\Repository\Exercise\ExerciseRepository;
use App\Repository\ObjetiveExercise\ObjetiveExerciseRepository;
use App\Repository\OpeningSchedule\OpeningScheduleRepository;
use App\Repository\SchedulingExercise\SchedulingExerciseRepository;
use App\Repository\Subscription\SubscriptionRepository;
use App\Repository\User\UserRepository;
use App\Repository\UserMeasurement\UserMeasurementRepository;
use App\Services\Auth\AuthServices;
use App\Services\Exercise\ExerciseServices;
use App\Services\ObjetiveExercise\ObjetiveExerciseServices;
use App\Services\OpeningSchedule\OpeningScheduleServices;
use App\Services\SchedulingExercise\SchedulingExerciseServices;
use App\Services\Subscription\SubscriptionServices;
use App\Services\User\UserServices;
use App\Services\UserMeasurement\UserMeasurementServices;
use Illuminate\Support\ServiceProvider;

class RepositoriesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IObjetiveExerciseRepository::class, ObjetiveExerciseRepository::class);
        $this->app->bind(IObjetiveExerciseServices::class, ObjetiveExerciseServices::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IUserServices::class, UserServices::class);
        $this->app->bind(ISchedulingExerciseRepository::class, SchedulingExerciseRepository::class);
        $this->app->bind(ISchedulingExerciseServices::class, SchedulingExerciseServices::class);
        $this->app->bind(IExerciseRepository::class, ExerciseRepository::class);
        $this->app->bind(IExerciseServices::class, ExerciseServices::class);
        $this->app->bind(IOpeningScheduleRepository::class, OpeningScheduleRepository::class);
        $this->app->bind(IOpeningScheduleServices::class, OpeningScheduleServices::class);
        $this->app->bind(IUserMeasurementRepository::class, UserMeasurementRepository::class);
        $this->app->bind(IUserMeasurementServices::class, UserMeasurementServices::class);
        $this->app->bind(ISubscriptionRepository::class, SubscriptionRepository::class);
        $this->app->bind(ISubscriptionServices::class, SubscriptionServices::class);
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
        $this->app->bind(IAuthServices::class, AuthServices::class);
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
