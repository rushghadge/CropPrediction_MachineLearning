<?php

namespace App\Http\Controllers\Cropprediction;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cropprediction;
use Illuminate\Http\Request;

class CroppredictionsController extends Controller
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
            $croppredictions = Cropprediction::where('pH', 'LIKE', "%$keyword%")
                ->orWhere('temperature', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $croppredictions = Cropprediction::paginate($perPage);
        }

        return view('cropprediction.croppredictions.index', compact('croppredictions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cropprediction.croppredictions.create');
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
        
        Cropprediction::create($requestData);

        return redirect('cropprediction/croppredictions')->with('flash_message', 'Cropprediction added!');
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
        $cropprediction = Cropprediction::findOrFail($id);

        return view('cropprediction.croppredictions.show', compact('cropprediction'));
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
        $cropprediction = Cropprediction::findOrFail($id);

        return view('cropprediction.croppredictions.edit', compact('cropprediction'));
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
        
        $cropprediction = Cropprediction::findOrFail($id);
        $cropprediction->update($requestData);

        return redirect('cropprediction/croppredictions')->with('flash_message', 'Cropprediction updated!');
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
        Cropprediction::destroy($id);

        return redirect('cropprediction/croppredictions')->with('flash_message', 'Cropprediction deleted!');
    }
}
