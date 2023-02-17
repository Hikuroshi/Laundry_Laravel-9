<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.member.index', [
            'title' => 'Member',
            'members' => Member::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_jenis_kelamin = ['L', 'P'];

        return view('dashboard.member.create', [
            'title' => 'Tambah Member',
            'all_jenis_kelamin' => $all_jenis_kelamin
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'telepon' => ['required', 'min:11', 'max:13', 'unique:members', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/'],
        ],
        [
            'telepon.regex' => 'The telepon must be start with: +62/62/0.',
        ]);

        $validatedData['nama'] = ucwords($request->nama);
        $validatedData['slug'] = SlugService::createSlug(Member::class, 'slug', $request->nama);

        Member::create($validatedData);
        return redirect('/dashboard/members')->with('success', 'Member berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $all_jenis_kelamin = ['L', 'P'];

        return view('dashboard.member.edit', [
            'title' => 'Edit Member',
            'all_jenis_kelamin' => $all_jenis_kelamin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $rules = [
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ];

        if ($request->telepon != $member->telepon) {
            $rules['telepon'] = ['required', 'min:11', 'max:13', 'unique:members', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/'];
        }

        $validatedData = $request->validate($rules, [
            'telepon.regex' => 'The telepon must be start with: +62/62/0.'
        ]);

        $validatedData['nama'] = ucwords($request->nama);
        $validatedData['slug'] = SlugService::createSlug(Member::class, 'slug', $request->nama);

        Member::where('id', $member->id)->update($validatedData);
        return redirect('/dashboard/members')->with('success', 'Member berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        Member::destroy($member->id);
        return redirect('/dashboard/members')->with('success', 'Member berhasil dihapus!');
    }
}
