<?php

/**
 * @file
 * Provide views for drupagram
 */

function drupagram_views_default_views() {
  $view = new view;
  $view->name = 'instagrams';
  $view->description = 'Displays Instagram.com media for users who have associated Instagram accounts.';
  $view->tag = '';
  $view->base_table = 'drupagram';
  $view->core = 6;
  $view->api_version = '2';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */
  $handler = $view->new_display('default', 'Defaults', 'default');
  $handler->override_option('fields', array(
    'images' => array(
      'id' => 'images',
      'table' => 'drupagram',
      'field' => 'images',
    ),
    'created_time' => array(
      'id' => 'created_time',
      'table' => 'drupagram',
      'field' => 'created_time',
    ),
  ));
  $handler->override_option('sorts', array(
    'created_time' => array(
      'id' => 'created_time',
      'table' => 'drupagram',
      'field' => 'created_time',
    ),
  ));
  $handler->override_option('arguments', array(
    'uid' => array(
      'id' => 'uid',
      'table' => 'users',
      'field' => 'uid',
    ),
  ));
  $handler->override_option('access', array(
    'type' => 'none',
  ));
  $handler->override_option('cache', array(
    'type' => 'none',
  ));
  $handler = $view->new_display('page', 'Page', 'page_1');
  $handler->override_option('fields', array(
    'images' => array(
      'id' => 'images',
      'table' => 'drupagram',
      'field' => 'images',
    ),
    'filter' => array(
      'label' => 'Filter',
      'alter' => array(
        'alter_text' => 0,
        'text' => '',
        'make_link' => 0,
        'path' => '',
        'absolute' => 0,
        'link_class' => '',
        'alt' => '',
        'rel' => '',
        'prefix' => '',
        'suffix' => '',
        'target' => '',
        'help' => '',
        'trim' => 0,
        'max_length' => '',
        'word_boundary' => 1,
        'ellipsis' => 1,
        'html' => 0,
        'strip_tags' => 0,
      ),
      'empty' => '',
      'hide_empty' => 0,
      'empty_zero' => 0,
      'hide_alter_empty' => 1,
      'exclude' => 0,
      'id' => 'filter',
      'table' => 'drupagram',
      'field' => 'filter',
      'override' => array(
        'button' => 'Use default',
      ),
      'relationship' => 'none',
    ),
    'caption' => array(
      'label' => 'Caption',
      'alter' => array(
        'alter_text' => 0,
        'text' => '',
        'make_link' => 0,
        'path' => '',
        'absolute' => 0,
        'link_class' => '',
        'alt' => '',
        'rel' => '',
        'prefix' => '',
        'suffix' => '',
        'target' => '',
        'help' => '',
        'trim' => 0,
        'max_length' => '',
        'word_boundary' => 1,
        'ellipsis' => 1,
        'html' => 0,
        'strip_tags' => 0,
      ),
      'empty' => '',
      'hide_empty' => 0,
      'empty_zero' => 0,
      'hide_alter_empty' => 1,
      'exclude' => 0,
      'id' => 'caption',
      'table' => 'drupagram',
      'field' => 'caption',
      'override' => array(
        'button' => 'Use default',
      ),
      'relationship' => 'none',
    ),
    'link' => array(
      'label' => 'Link to post',
      'alter' => array(
        'alter_text' => 0,
        'text' => '',
        'make_link' => 0,
        'path' => '',
        'absolute' => 0,
        'link_class' => '',
        'alt' => '',
        'rel' => '',
        'prefix' => '',
        'suffix' => '',
        'target' => '',
        'help' => '',
        'trim' => 0,
        'max_length' => '',
        'word_boundary' => 1,
        'ellipsis' => 1,
        'html' => 0,
        'strip_tags' => 0,
      ),
      'empty' => '',
      'hide_empty' => 0,
      'empty_zero' => 0,
      'hide_alter_empty' => 1,
      'display_as_link' => 1,
      'exclude' => 0,
      'id' => 'link',
      'table' => 'drupagram',
      'field' => 'link',
      'override' => array(
        'button' => 'Use default',
      ),
      'relationship' => 'none',
    ),
    'created_time' => array(
      'label' => 'Created time',
      'alter' => array(
        'alter_text' => 0,
        'text' => '',
        'make_link' => 0,
        'path' => '',
        'absolute' => 0,
        'link_class' => '',
        'alt' => '',
        'rel' => '',
        'prefix' => '',
        'suffix' => '',
        'target' => '',
        'help' => '',
        'trim' => 0,
        'max_length' => '',
        'word_boundary' => 1,
        'ellipsis' => 1,
        'html' => 0,
        'strip_tags' => 0,
      ),
      'empty' => '',
      'hide_empty' => 0,
      'empty_zero' => 0,
      'hide_alter_empty' => 1,
      'date_format' => 'time ago',
      'custom_date_format' => '',
      'exclude' => 0,
      'id' => 'created_time',
      'table' => 'drupagram',
      'field' => 'created_time',
      'override' => array(
        'button' => 'Use default',
      ),
      'relationship' => 'none',
    ),
    'likes' => array(
      'label' => 'Likes',
      'alter' => array(
        'alter_text' => 0,
        'text' => '',
        'make_link' => 0,
        'path' => '',
        'absolute' => 0,
        'link_class' => '',
        'alt' => '',
        'rel' => '',
        'prefix' => '',
        'suffix' => '',
        'target' => '',
        'help' => '',
        'trim' => 0,
        'max_length' => '',
        'word_boundary' => 1,
        'ellipsis' => 1,
        'html' => 0,
        'strip_tags' => 0,
      ),
      'empty' => '',
      'hide_empty' => 0,
      'empty_zero' => 1,
      'hide_alter_empty' => 1,
      'format' => 'key',
      'key' => 'count',
      'exclude' => 0,
      'id' => 'likes',
      'table' => 'drupagram',
      'field' => 'likes',
      'override' => array(
        'button' => 'Use default',
      ),
      'relationship' => 'none',
    ),
  ));
  $handler->override_option('use_pager', '1');
  $handler->override_option('pager_element', 10);
  $handler->override_option('style_plugin', 'table');
  $handler->override_option('style_options', array(
    'grouping' => '',
    'override' => 1,
    'sticky' => 0,
    'order' => 'asc',
    'summary' => '',
    'columns' => array(
      'images' => 'images',
      'filter' => 'filter',
      'caption' => 'caption',
      'link' => 'link',
      'created_time' => 'created_time',
      'likes' => 'likes',
    ),
    'info' => array(
      'images' => array(
        'sortable' => 0,
        'separator' => '',
      ),
      'filter' => array(
        'sortable' => 0,
        'separator' => '',
      ),
      'caption' => array(
        'sortable' => 0,
        'separator' => '',
      ),
      'link' => array(
        'sortable' => 0,
        'separator' => '',
      ),
      'created_time' => array(
        'sortable' => 0,
        'separator' => '',
      ),
      'likes' => array(
        'separator' => '',
      ),
    ),
    'default' => '-1',
  ));
  $handler->override_option('path', 'user/%/instagram');
  $handler->override_option('menu', array(
    'type' => 'tab',
    'title' => 'Instagram',
    'description' => '',
    'weight' => '0',
    'name' => 'navigation',
  ));
  $handler->override_option('tab_options', array(
    'type' => 'none',
    'title' => '',
    'description' => '',
    'weight' => 0,
    'name' => 'navigation',
  ));
  $handler = $view->new_display('block', 'User Instagrams', 'block_1');
  $handler->override_option('fields', array(
    'images' => array(
      'label' => '',
      'alter' => array(
        'alter_text' => 0,
        'text' => '',
        'make_link' => 0,
        'path' => '',
        'absolute' => 0,
        'link_class' => '',
        'alt' => '',
        'rel' => '',
        'prefix' => '',
        'suffix' => '',
        'target' => '',
        'help' => '',
        'trim' => 0,
        'max_length' => '',
        'word_boundary' => 1,
        'ellipsis' => 1,
        'html' => 0,
        'strip_tags' => 0,
      ),
      'empty' => '',
      'hide_empty' => 0,
      'empty_zero' => 0,
      'hide_alter_empty' => 1,
      'source' => 'thumbnail',
      'link_to_post' => 0,
      'exclude' => 0,
      'id' => 'images',
      'table' => 'drupagram',
      'field' => 'images',
      'override' => array(
        'button' => 'Use default',
      ),
      'relationship' => 'none',
    ),
    'created_time' => array(
      'label' => '',
      'alter' => array(
        'alter_text' => 0,
        'text' => '',
        'make_link' => 0,
        'path' => '',
        'absolute' => 0,
        'link_class' => '',
        'alt' => '',
        'rel' => '',
        'prefix' => '',
        'suffix' => '',
        'target' => '',
        'help' => '',
        'trim' => 0,
        'max_length' => '',
        'word_boundary' => 1,
        'ellipsis' => 1,
        'html' => 0,
        'strip_tags' => 0,
      ),
      'empty' => '',
      'hide_empty' => 0,
      'empty_zero' => 0,
      'hide_alter_empty' => 1,
      'date_format' => 'time ago',
      'custom_date_format' => '',
      'exclude' => 0,
      'id' => 'created_time',
      'table' => 'drupagram',
      'field' => 'created_time',
      'override' => array(
        'button' => 'Use default',
      ),
      'relationship' => 'none',
    ),
  ));
  $handler->override_option('style_plugin', 'list');
  $handler->override_option('style_options', array(
    'grouping' => '',
    'type' => 'ul',
  ));
  $handler->override_option('block_description', '');
  $handler->override_option('block_caching', -1);

  return array('instagrams' => $view);
}
