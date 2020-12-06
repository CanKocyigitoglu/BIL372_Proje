import React, { Component } from "react";
import { Link } from 'react-router-dom';

export default class home extends Component {

    render() {
        return (
            <div>
                <Link to="/students"><button className="btn btn-primary btn-block">Students</button></Link>
            </div>
        );
    }
}