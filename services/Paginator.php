<?php

/**
 * User: Lee
 * Date: 2017/5/26
 * Time: 17:12
 */
class Paginator {

    public static function data($page, $limit, $count, $url, $param_arr) {
        $nextpage = $page;
        $pages = ceil((int)$count / (int)$limit);

        if ($pages > $page) {
            $next = 1;
        } else {
            $next = 0;
        }

        if ($nextpage < $pages) {
            $nextpage++;
        } else {
            $next = 0;
        }

        $prev = 0;
        if ($page > 1) {
            $prev = 1;
            $prevpage = $page - 1;
            if ($prevpage > 0) {
                $prev = 1;
            }
        } else {
            $prevpage = 1;
        }

        $search_str = '';
        if (!empty($param_arr)) {
            foreach ($param_arr as $key => $value) {
                $search_str .= "&$key=$value";
            }
        }

        $arr = [
            "pagenum"  => $pages,
            "prevpage" => $prev,
            "nextpage" => $next,
            "prevurl"  => empty($search_str) ? dirname($_SERVER['PHP_SELF']) . "/$url?page=$prevpage" : dirname($_SERVER['PHP_SELF']) . "/$url?page=$prevpage" . $search_str,
            "nexturl"  => empty($search_str) ? dirname($_SERVER['PHP_SELF']) . "/$url?page=$nextpage" : dirname($_SERVER['PHP_SELF']) . "/$url?page=$nextpage" . $search_str,
            "pages"    => []
        ];

        for ($i = 1; $i <= $pages; $i++) {
            if ($i == $page) {
                $data = [
                    'url'       => '',
                    'isCurrent' => 0,
                    'num'       => $i
                ];
            } else {
                $data = [
                    'url'       => empty($search_str) ? dirname($_SERVER['PHP_SELF']) . "/$url?page=$i" : dirname($_SERVER['PHP_SELF']) . "/$url?page=$i" . $search_str,
                    'isCurrent' => 1,
                    'num'       => $i
                ];
            }

            array_push($arr['pages'], $data);
        }

        return $arr;
    }
}