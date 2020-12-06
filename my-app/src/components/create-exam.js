import React, { Component } from "react";

export default class students extends Component {

    render() {
        return (
            <div>
                <h3>CREATE EXAM PAGE</h3>
                <div className="form-group">
                    <label>Start time</label>
                    <input type="text" className="form-control" placeholder="Enter start time" />
                </div>

                <div className="form-group">
                    <label>Finish time</label>
                    <input type="text" className="form-control" placeholder="Enter finish time" />
                </div>

                <div className="Exam Date">
                    <label>Email address</label>
                    <input type="email" className="form-control" placeholder="Enter exam Date" />
                </div>

                <div className="form-group">
                    <label>%</label>
                    <input type="password" className="form-control" placeholder="Enter %" />
                </div>
                <div className="form-group">
                    <label>Total Exam Time</label>
                    <input type="password" className="form-control" placeholder="Enter total exam time" />
                </div>
                <div className="form-group">
                    <label>Total question number</label>
                    <input type="password" className="form-control" placeholder="Enter total question number" />
                </div>
                <button type="submit" className="btn btn-primary btn-block">Create Exam</button>
            </div>
        );
    }
}