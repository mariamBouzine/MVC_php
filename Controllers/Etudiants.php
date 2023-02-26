<?php

use Etudiants as GlobalEtudiant;

class Etudiants extends Controller{
    public function __construct()
    {
        parent::__construct('Etudiant');
    }
    public function index(){
        parent::view("index",Etudiant::All());
    }
    public function show($id){
        $this->view("show",Etudiant::find($id));
    }
    public function destroy($id){
        $P = Etudiant::find($id);
        $P->delete();
        parent::Redirect("../../Profs");
    }
    public function store($request){
        $p = new Etudiant();
      $p->nom = $request->nom;
      $p->prenom = $request->prenom;
      $p->specialite = $request->specialite;
      $p->save();
      parent::Redirect("../etudiants");
    }
    public function edit($id){
        parent::view("form",Etudiant::find($id));
    }
    public function upsate($id,$reques)
    {
        $p = Etudiant::find($id);
    //   $p->nom = $request->nom;
    //   $p->prenom = $request->prenom;
    //   $p->specialite = $request->specialite;
    //   $p->save();
      parent::Redirect("../../Profs");
    }
    public function create(){
        $this->view("form");
    }
}