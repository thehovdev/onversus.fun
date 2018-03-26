<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Battle;

class BattleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $battle = new Battle;
        // $battle = $battle->all();
        //
        // return view('index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Battle $battle)
    {
        $validatedData = $request->validate([
            'team1' => 'required',
            'team2' => 'required',
            'first_team_img' => 'required|image|mimes:jpg,jpeg,png,gif',
            'second_team_img' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        $first_team = $request->team1;
        $second_team = $request->team2;

        $images = ['first_team_img', 'second_team_img'];




        foreach ($images as $file) {
            if ($request->hasFile($file)) {

                $image = $request->file($file);

                $image_id = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                $destinationPath = public_path('storage/images/');
                $image->move($destinationPath, $image_id);

                $battle->{$file} = $image_id;
            }
        }


        $battle->first_team = $first_team;
        $battle->second_team = $second_team;
        $battle->save();

        return redirect("/battle/$battle->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $battle = new Battle;
        $battle = $battle->find($id);

        return view('show')
            ->with('battle', $battle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function vote(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'team' => 'required',
        ]);

        $battle = new Battle;
        $id = $request->id;
        $teamvotes = $request->team;


        $battle = $battle->find($id);
        $battle->{$teamvotes}++;
        $battle->save();

        $result['status'] = 1;
        $result['msg'] = 'success';
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
