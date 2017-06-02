<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 10:42
 */
class HomeController extends BaseController {

    public function home() {
        $limit = config('common.page_num');
        $page = (int)get('page', 1);
        $count = Articles::where('status', 1)->count();

        $this->view = View::make('home/home')
            ->with('article', Articles::where('status', 1)
                ->offset(($page - 1) * $limit)
                ->limit($limit)->get())
            ->with('tags', Articles::where('status', 1)->orderByRaw('RAND()')->take(25)->get())
            ->paginate($page, $limit, $count, 'home');
    }

    public function essay() {
        $id = get('id');

        if (empty($id)) {
            redirect('home');
        }

        $data = Articles::where('id', $id)->where('status', '<>', 0)->first();
        if (empty($data)) {
            redirect('home');
        }
        $prevdata = Articles::where('id', '<', $id)->where('status', '<>', 0)->orderBy('id', 'desc')->first();
        $nextdata = Articles::where('id', '>', $id)->where('status', '<>', 0)->orderBy('id', 'asc')->first();

        $this->view = View::make('home/essay')
            ->with('essay', $data)
            ->with('prevdata', $prevdata)
            ->with('nextdata', $nextdata)
            ->with('tags', Articles::where('status', 1)
                ->orderByRaw('RAND()')
                ->take(30)
                ->get());
    }

    public function search() {
        $str = get('str');

        if (empty($str)) {
            redirect('home');
        }

        $limit = config('common.page_num');
        $page = (int)get('page', 1);
        $count = Articles::where('status', 1)->where('title', 'like', '%' . $str . '%')->count();

        $this->view = View::make('home/search')
            ->with('article', Articles::where('status', 1)
                ->where('title', 'like', '%' . $str . '%')
                ->offset(($page - 1) * $limit)
                ->limit($limit)->get())
            ->with('tags', Articles::where('status', 1)
                ->orderByRaw('RAND()')
                ->take(30)
                ->get())
            ->paginate($page, $limit, $count, 'search', ['str' => $str]);
    }

    public function date() {
        $year = get('year', date('Y'));
        $month = get('month');

        if (empty($month)) {
            redirect('home');
        }

        $start = mktime(0, 0, 0, $month, 1, $year);
        $end = mktime(0, 0, 0, $month, date('t'), $year);

        $limit = config('common.page_num');
        $page = (int)get('page', 1);
        $count = Articles::where('status', 1)->where('time', '>=', $start)->where('time', '<=', $end)->count();

        $this->view = View::make('home/date')
            ->with('article', Articles::where('status', 1)
                ->where('time', '>=', $start)
                ->where('time', '<=', $end)
                ->offset(($page - 1) * $limit)
                ->limit($limit)->get())
            ->with('tags', Articles::where('status', 1)
                ->orderByRaw('RAND()')
                ->take(30)
                ->get())
            ->paginate($page, $limit, $count, 'date', ['year' => $year, 'month' => $month]);
    }
}