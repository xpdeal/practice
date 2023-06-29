import React from "react";
//components
import Data from "./components/Data";
import Button from "./components/Button";
import Table from "./components/Table";
import Image from "./components/view/Image";
import "./App.css";
import Article from "./components/Article";
export default function App() {

  let artigos = [
    {id: 1,titulo: "titulo 1", subtitulo:"subtitulo 1"},
    {id: 2,titulo: "titulo 2", subtitulo:"subtitulo 2"},
    {id: 3,titulo: "titulo 3", subtitulo:"subtitulo 3"},
    {id: 4,titulo: "titulo 4", subtitulo:"subtitulo 4"},
    {id: 5,titulo: "titulo 5", subtitulo:"subtitulo 5"}
  ]
  
  let conteudo = artigos.map(art =><Article key={art.id} titulo={art.titulo} subtitulo={art.subtitulo} /> )
  return (
    <>
    <h3>App!</h3>
      {conteudo}
      {/* <h1>ButtonReact</h1>
      <h3>ButtonReact</h3>
      <Data />
      <Button />
      <Image />
      <Table />
      <Article 
        id: 1,titulo="noticia 1" 
        subtitulo="sub 1"
      />
      <Article 
        id: 1,titulo={artigos[0].id: 1,titulo} 
        subtitulo={artigos[0].subtitulo} 
      /> */}
    </>
  );
}
