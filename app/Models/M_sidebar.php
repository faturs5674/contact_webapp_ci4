<?php

namespace App\Models;

use \Config\Database;

class M_sidebar
{

    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function get_list()
    {
        return $this->db->table('sidebar as sb')
            ->select('sb.sidebar_id, sb.sidebar_href, sb.sidebar_parent, sb.sidebar_nama, sb.sidebar_kode, sb.sidebar_icon, count(0) as childs')
            ->join('sidebar as pr', 'pr.sidebar_parent = sb.sidebar_id', 'left')
            ->where('sb.sidebar_parent', '0')
            ->where('sb.status', '1')
            ->groupBy('sb.sidebar_id, pr.sidebar_parent')
            ->orderBy('sb.sidebar_position', 'asc')
            ->get()->getResult();
    }

    public function get_childs($parent_id)
    {
        return $this->db->table('sidebar as sb')
            ->select('sb.sidebar_id, sb.sidebar_href, sb.sidebar_parent, sb.sidebar_nama, sb.sidebar_kode, sb.sidebar_icon')
            ->where('sb.sidebar_parent', $parent_id)
            ->where('sb.status', '1')
            ->orderBy('sb.sidebar_position', 'asc')
            ->get()->getResult();
    }
}
