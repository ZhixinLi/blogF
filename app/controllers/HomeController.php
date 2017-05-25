<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 10:42
 */
class HomeController extends BaseController {

    public function home() {
        $limit = 2;
        $page = (int)get('page', 1);
        $nextpage = $page;

        $count = Articles::where('status', 1)->count();
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
            "prevurl"  => dirname($_SERVER['PHP_SELF']) . "/home?page=$prevpage",
            "nexturl"  => dirname($_SERVER['PHP_SELF']) . "/home?page=$nextpage",
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
                    'url'       => dirname($_SERVER['PHP_SELF']) . "/home?page=$i",
                    'isCurrent' => 1,
                    'num'       => $i
                ];
            }

            array_push($arr['pages'], $data);
        }

        $this->view = View::make('home/home')->with('article', Articles::where('status', 1)->offset(($page - 1) * $limit)->limit($limit)->get())->with('paginator', $arr);
    }
}