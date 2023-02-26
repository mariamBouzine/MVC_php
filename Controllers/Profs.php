<?php
  class Profs extends Controller
  {

    public function __construct()
    {
      parent::__construct('Prof');
    }

    public function index()
    {
        parent::view("index",Prof::All());
    } 

    public function show($id)
    {
      $this->view("show",Prof::find($id));
    }

    public function destroy($id)
    {
      $P = Prof::find($id);
      $P->delete();
      parent::Redirect("../../Profs");

    }

    public function store($request)
    {
    
      $p = new Prof();
      $p->nom = $request->nom;
      $p->prenom = $request->prenom;
      $p->specialite = $request->specialite;
      $p->save();
      parent::Redirect("../Profs");
    }

    public function edit($id)
    {
      parent::view("form",Prof::find($id));
    }

    public function update($id, $request)
    {
      $p = Prof::find($id);
      $p->nom = $request->nom;
      $p->prenom = $request->prenom;
      $p->specialite = $request->specialite;
      $p->save();
      parent::Redirect("../../Profs");
    }
    public function create()
    {
      parent::view("form");
    }
  }
