<?php

namespace App\Http\Controllers\Debug;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Debug;
use Illuminate\Http\Request;

class DebugsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $debugs = Debug::where('debu', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $debugs = Debug::paginate($perPage);
        }

        return view('debug.debugs.index', compact('debugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('debug.debugs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Debug::create($requestData);

        return redirect('debug/debugs')->with('flash_message', 'Debug added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $debug = Debug::findOrFail($id);

        return view('debug.debugs.show', compact('debug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $debug = Debug::findOrFail($id);

        return view('debug.debugs.edit', compact('debug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $debug = Debug::findOrFail($id);
        $debug->update($requestData);

        return redirect('debug/debugs')->with('flash_message', 'Debug updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Debug::destroy($id);

        return redirect('debug/debugs')->with('flash_message', 'Debug deleted!');
    }
}
