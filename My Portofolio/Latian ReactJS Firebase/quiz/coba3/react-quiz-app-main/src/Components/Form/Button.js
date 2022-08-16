import React from 'react'

function Button(props) {
    return (
        <div>
            <button onClick={props.onclick}>{props.btnText}</button>
        </div>
    )
}

export default Button
