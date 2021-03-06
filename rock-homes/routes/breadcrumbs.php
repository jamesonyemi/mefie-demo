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

// Home > Clients
Breadcrumbs::for('projects-in-general', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push('projects in general', route('project-list'));
});
// Home > projects
Breadcrumbs::for('individual-client-project', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push('individual clients', route('projects.index'));
});

// Home > projects > view project
Breadcrumbs::for('view-project', function (BreadcrumbTrail $trail) {
  $trail->parent('individual-client-project');
  $trail->push('view project', route('projects.show', Auth::user()->clientid));
});

Breadcrumbs::for('edit-project', function (BreadcrumbTrail $trail) {
  $trail->parent('individual-client-project');
  $trail->push('edit project', route('projects.edit', Auth::user()->clientid));
});

// Home > action board > edit client details
Breadcrumbs::for('edit', function ($trail) {
  $trail->parent('action board');
  $trail->push('edit client details', route('clients.edit', Auth::user()->clientid));
});

// Home > action board > view client details
Breadcrumbs::for('view-client-details', function ($trail) {
  $trail->parent('action board');
  $trail->push('view client details', route('clients.show', Auth::user()->clientid));
});

