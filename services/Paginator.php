<?php

/**
 * User: Lee
 * Date: 2017/5/26
 * Time: 17:12
 */
class Paginator {
    
    public static function data($page, $limit, $count, $url) {
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

        $arr = [
            "pagenum"  => $pages,
            "prevpage" => $prev,
            "nextpage" => $next,
            "prevurl"  => dirname($_SERVER['PHP_SELF']) . "/$url?page=$prevpage",
            "nexturl"  => dirname($_SERVER['PHP_SELF']) . "/$url?page=$nextpage",
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
                    'url'       => dirname($_SERVER['PHP_SELF']) . "/$url?page=$i",
                    'isCurrent' => 1,
                    'num'       => $i
                ];
            }

            array_push($arr['pages'], $data);
        }

        return $arr;
    }
}