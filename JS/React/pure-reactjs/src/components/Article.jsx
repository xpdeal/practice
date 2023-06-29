export default function Article(props){
// export default function Article(nome){//sus o props por um nome
// export default function Article({titulo, subtitulo}){// desinstruturação
    return (
    <>
    <h3>{props.titulo}</h3>
    <h5>{props.subtitulo}</h5>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos sint, tempore, aut incidunt illo corrupti voluptatum ratione officiis dolore hic molestiae accusantium nihil odio. Nemo fugiat illo asperiores modi veritatis.</p>
    </>
    )
}