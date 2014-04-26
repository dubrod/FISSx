<?php
/**
 * fissx
 * https://github.com/dubrod/FISSx
 *
 * DESCRIPTION
 * This snippet should be used to create one of those cool Infinite Scroll (or not) Content Sections with a Filterable Category Listings. 
 * There is no frontend code included, that should be customized to your design.
 *
 * PROPERTIES:
 *
 * &tpl string optional Name of a chunk to use for rendering output. If not provided an array of available placeholders will be rendered.
 * &separator string optional String that will be used as a separator between records
 *
 * USAGE:
 *
 * [[!fissx? &tpl=`infinite_resources` &separator=``]]
 *
 */

$tpl = $modx->getOption('tpl', $scriptProperties, '');
$separator = $modx->getOption('separator', $scriptProperties, '');

$c = $modx->newQuery('modResource');

$c->select($modx->getSelectColumns('modResource', 'Parent', 'category_', array('id', 'pagetitle', 'alias', 'parent')));
$c->select($modx->getSelectColumns('modResource', 'modResource'));


$c->leftJoin('modResource', 'Parent');

$c->where(array(
    'Parent.parent' => $modx->resource->id
));

$c->sortby('modResource.id', 'DESC');

$resources = $modx->getIterator('modResource', $c);

$output = array();
foreach ($resources as $resource) {
    $resourceArray = $resource->toArray();
    //thumbnail is optional
    $resourceArray['tv_tn'] = $resource->getTVValue('infinite_tn');

    if ($tpl != '') {
        $output[] = $modx->getChunk($tpl, $resourceArray);
    } else {
        $output[] = print_r($resourceArray, true);
    }
}

if ($tpl != '') {
    return implode($separator, $output);
} else {
    return '<pre>' . implode('', $output) . '</pre>';
}