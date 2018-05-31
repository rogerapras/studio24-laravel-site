<?php

namespace App\Http\Middleware;

use Closure;
use App\Service;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('topMenu', function ($menu) {
            $menu->add('Главная', ['route' => 'main']);
            $menu->add('Статьи', ['action' => 'ArticleController@index']);
            $menu->add('Услуги', ['action' => 'ServiceController@index',])->nickname('services');
            $menu->add('О нас', ['action' => ['PageController@index','url' => 'about']]);
            $menu->add('Отзывы', ['action' => 'ReviewController@index']);

            // Dynamic menu items from Service model
            //foreach (Service::all() as $item)
            //{
            //    $menu->services->add($item->name, 'services/' . $item->id);
            //}
        });

        return $next($request);
    }
}
