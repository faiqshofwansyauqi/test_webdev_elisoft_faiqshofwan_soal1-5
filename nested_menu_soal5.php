<?php
function generate_nested_menu($menus, $parent_id = 0, $prefix = '') {
    $nested_menu = '';

    // Filter menu dengan parent_id sesuai dengan parameter parent_id
    $filtered_menus = array_filter($menus, function($menu) use ($parent_id) {
        return $menu['parent_id'] == $parent_id;
    });

    // Loop melalui menu yang sudah difilter
    foreach ($filtered_menus as $menu) {
        $nested_menu .= $prefix . '- ' . $menu['nama'] . PHP_EOL;

        // Panggil fungsi rekursif untuk menghasilkan nested menu pada level selanjutnya
        $nested_menu .= generate_nested_menu($menus, $menu['id'], $prefix . '  ');
    }

    return $nested_menu;
}

$menus = [
    ['id' => 1, 'nama' => 'Menu 1', 'parent_id' => 0],
    ['id' => 2, 'nama' => 'Menu 1.1', 'parent_id' => 1],
    ['id' => 3, 'nama' => 'Menu 1.2', 'parent_id' => 1],
    ['id' => 4, 'nama' => 'Menu 2', 'parent_id' => 0],
    ['id' => 5, 'nama' => 'Menu 2.1', 'parent_id' => 4],
    ['id' => 6, 'nama' => 'Menu 2.2', 'parent_id' => 4],
    ['id' => 7, 'nama' => 'Menu 2.1.1', 'parent_id' => 5],
    ['id' => 8, 'nama' => 'Menu 3', 'parent_id' => 0],
];

$nested_menu = generate_nested_menu($menus);
echo $nested_menu;
?>