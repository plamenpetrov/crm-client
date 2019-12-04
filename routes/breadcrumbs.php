<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Contragents
Breadcrumbs::register('contragents', function($breadcrumbs)
{
    $breadcrumbs->push(UI::translate('contragents.contragents'), route('contragents'));
});

// Contragents -> Create
Breadcrumbs::register('contragent_create', function($breadcrumbs)
{
    $breadcrumbs->parent('contragents');
    $breadcrumbs->push(UI::translate('contragents.create-new-contragent'), route('contragent_create'));
});

// Contragents -> Edit
Breadcrumbs::register('contragent_edit', function($breadcrumbs, $contragent)
{
    $breadcrumbs->parent('contragents');
    $breadcrumbs->push(UI::translate('contragents.create-edit-contragent'), route('contragent_edit', $contragent));
});

// Contragents -> Show
Breadcrumbs::register('contragent_show', function($breadcrumbs, $contragent)
{
    $breadcrumbs->parent('contragents');
    $breadcrumbs->push(UI::translate('contragents.create-show-contragent'), route('contragent_show', $contragent));
});



//
//// Home > Blog
//Breadcrumbs::register('blog', function($breadcrumbs)
//{
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Blog', route('blog'));
//});
//
//// Home > Blog > [Category]
//Breadcrumbs::register('category', function($breadcrumbs, $category)
//{
//    $breadcrumbs->parent('blog');
//    $breadcrumbs->push($category->title, route('category', $category->id));
//});
//
//// Home > Blog > [Category] > [Page]
//Breadcrumbs::register('page', function($breadcrumbs, $page)
//{
//    $breadcrumbs->parent('category', $page->category);
//    $breadcrumbs->push($page->title, route('page', $page->id));
//});