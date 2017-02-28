<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::directive('datetime', function($expression) {
			return "<?php echo Carbon\Carbon::parse($expression)->formatLocalized('%A %d de %B del %Y a las %R hrs.'); ?>";
		});

		Blade::directive('locale', function(){
			return "<?php setlocale(LC_TIME,'es_MX.utf-8'); ?>";
		});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
