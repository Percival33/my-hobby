<?php
const PAGE_SIZE = 2;
use MongoDB\BSON\ObjectID;

function get_number_of_pages() {
    $query = [
        'private'   => false
    ];


    $db = get_db();
    $img_number = $db->pictures->count($query);

    return (int) ceil($img_number / PAGE_SIZE);
}

function get_pictures($page_number = 1, $user_id = null)
{

    if($page_number < 1)
        $page_number = 1;

    $db = get_db();
    $query = ['private'   => false];

    if(isset($user_id)) {
        $query = [
            '$or' => [
                ['private'  =>  false],
                ['user'     =>  $user_id]
            ]
        ];
    }

    $opts = [
        'sort' => [
            '_id' => -1
        ],
        'skip'  => ($page_number - 1) * PAGE_SIZE,
        'limit' => PAGE_SIZE
    ];

    $pictures = $db->pictures->find($query, $opts);

    if(empty($pictures)) {
        $opts['skip'] = (get_number_of_pages() - 1) * PAGE_SIZE;
        $pictures = $db->pictures->find($query, $opts);
    }

    return $pictures->toArray();
}

function get_user_pictures($user_id)
{
    $db = get_db();

    $query = [
        'user' => $user_id
    ];

    $opts = [
        'sort' => [
            '_id' => -1
        ]
    ];

    return $db->pictures->find($query, $opts)->toArray();
}

function get_one_picture($img_id)
{
    $db = get_db();

    $query = [
        '_id' => new ObjectId($img_id)
    ];

    $img = $db->pictures->findOne($query);

    return $img;
}

function update_picture($picture)
{
    $db = get_db();

    extract($picture);
    $img = get_one_picture($id);

    $img['title'] = $title;
    $img['author'] = $author;
    $img['alt'] = $alt;
    $img['private'] = $private;

    $query = [
        '_id' => new ObjectId($id)
    ];

    $db->pictures->replaceOne($query, $img);
}

function search_pictures($title, $user_id = null)
{
    $db = get_db();

    $query = [
        'private'  => false,
        'title' => [
            '$regex'    => $title,
            '$options'  => 'i'
        ]
    ];

    if(isset($user_id)) {
        $query = [
            '$or' => [
                ['private'  =>  false],
                ['user'     =>  $user_id]
            ],

            'title' => [
                '$regex'    => $title,
                '$options'  => 'i'
            ]
        ];
    }



    $opts = [
        'sort' => [
            '_id' => -1
        ]
    ];

    return $db->pictures->find($query, $opts)->toArray();
}