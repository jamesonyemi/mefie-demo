<?php 
// routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Clients
Breadcrumbs::for('action board', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('action board', route('clients.index'));
});

// Home > action board > edit client details
Breadcrumbs::for('edit', function ($trail) {
  $trail->parent('action board');
  $trail->push('edit client details', route('clients.edit', Auth::user()->clientid));
});

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });
