<?php
return [
    'controllers' => [
        'factories' => [
            'PNGImage\Controller\Index' => 'PNGImage\Service\Controller\IndexControllerFactory',
        ],
    ],
    'api_adapters' => [
        'invokables' => [
            'PNGImage_entities' => 'PNGImage\Api\Adapter\EntityAdapter',
            'PNGImage_imports' => 'PNGImage\Api\Adapter\ImportAdapter',
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => OMEKA_PATH . '/modules/PNGImage/language',
                'pattern' => '%s.mo',
                'text_domain' => null,
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            OMEKA_PATH . '/modules/PNGImage/view',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'xmlPropertySelector' => 'PNGImage\View\Helper\PropertySelector',
        ],
        'factories' => [
            'mediaSidebar' => 'PNGImage\Service\ViewHelper\MediaSidebarFactory',
            'itemSidebar' => 'PNGImage\Service\ViewHelper\ItemSidebarFactory',
        ],
    ],
    'entity_manager' => [
        'mapping_classes_paths' => [
            OMEKA_PATH . '/modules/PNGImage/src/Entity',
        ],
    ],
    'form_elements' => [
        'factories' => [
            'PNGImage\Form\ImportForm' => 'XPNGImage\Service\Form\ImportFormFactory',
            'PNGImage\Form\MappingForm' => 'PNGImage\Service\Form\MappingFormFactory',
        ],
    ],
    'xml_import1_mappings' => [
        'items' => [
            '\PNGImage\Mapping\PropertyMapping',
            '\PNGImage\Mapping\MediaMapping',
            '\PNGImage\Mapping\ItemMapping',
        ],
        'users' => [
            '\PNGImage\Mapping\UserMapping',
        ],
    ],
    'xml_import1_media_ingester_adapter' => [
        'url' => 'PNGImage\MediaIngesterAdapter\UrlMediaIngesterAdapter',
        'html' => 'PNGImage\MediaIngesterAdapter\HtmlMediaIngesterAdapter',
        'iiif' => null,
        'oembed' => null,
        'youtube' => null,
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'PNGImage' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/PNGImage',
                            'defaults' => [
                                '__NAMESPACE__' => 'PNGImage\Controller',
                                'controller' => 'Index',
                                'action' => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'past-imports' => [
                                'type' => 'Literal',
                                'options' => [
                                    'route' => '/past-imports',
                                    'defaults' => [
                                        '__NAMESPACE__' => 'PNGImage\Controller',
                                        'controller' => 'Index',
                                        'action' => 'past-imports',
                                    ],
                                ],
                            ],
                            'map' => [
                                'type' => 'Literal',
                                'options' => [
                                    'route' => '/map',
                                    'defaults' => [
                                        '__NAMESPACE__' => 'PNGImage\Controller',
                                        'controller' => 'Index',
                                        'action' => 'map',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'navigation' => [
        'AdminModule' => [
            
            [
                'label' => 'PNGImage Import1',
                'route' => 'admin/PNGImage',
                'resource' => 'PNGImage\Controller\Index',
                'pages' => [
                    [
                        'label'      => 'Import', // @translate
                        'route'      => 'admin/PNGImage',
                        'resource'   => 'PNGImage\Controller\Index',
                    ],
                    [
                        'label'      => 'Import', // @translate
                        'route'      => 'admin/PNGImage/map',
                        'resource'   => 'PNGImage\Controller\Index',
                        'visible'    => false,
                    ],
                    [
                        'label'      => 'Past Imports', // @translate
                        'route'      => 'admin/PNGImage/past-imports',
                        'controller' => 'Index',
                        'action' => 'past-imports',
                        'resource' => 'PNGImage\Controller\Index',
                    ],
                ],
            ],
        ],
    ],
    'js_translate_strings' => [
        'Remove mapping', // @translate
        'Undo remove mapping', // @translate
        'Select an item type at the left before choosing a resource class.', // @translate
        'Select an element at the left before choosing a property.', // @translate
        'Please enter a valid language tag.', // @translate
    ],
];