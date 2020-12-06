import React, { Component } from "react";
import { Link } from 'react-router-dom';

export default class home extends Component {

    render() {
        return (
            <div>
                <Link to="/students"><button className="btn btn-primary btn-block mb-2">Students</button></Link>
                <Link to="/exams"><button className="btn btn-primary btn-block mb-2">Exams</button></Link>
                <Link to="/create-exam"><button className="btn btn-primary btn-block">Create Exam</button></Link>
            </div>
        );
    }
}