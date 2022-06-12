<?php

return [

    'title' => 'Edytuj :label',

    'breadcrumb' => 'Edytuj',

    'actions' => [

        'delete' => [

            'label' => 'Usuń',

            'modal' => [

                'heading' => 'Usuń :label',

                'subheading' => 'Czy na pewno chcesz to zrobić?',

                'buttons' => [

                    'delete' => [
                        'label' => 'Usuń',
                    ],

                ],

            ],

            'messages' => [
                'deleted' => 'Usunięto',
            ],

        ],

        'view' => [
            'label' => 'Podgląd',
        ],

    ],

    'form' => [

        'actions' => [

            'cancel' => [
                'label' => 'Anuluj',
            ],

            'save' => [
                'label' => 'Zapisz',
            ],

        ],

    ],

    'messages' => [
        'saved' => 'Zapisano',
    ],

];
