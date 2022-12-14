import React from 'react'

export default function Listfilms(props) {
    return (
        <>
            <div className='container my-3'>
                <div className="card" style={{ width: "18rem" }}>
                    <img src={props.image} className="card-img-top" alt="..." />
                    <div className="card-body">
                        <h5 className="card-title">{props.title}</h5>
                        <p className="card-text">{props.description}</p>
                        <a href="/" className="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </>

    )
}
