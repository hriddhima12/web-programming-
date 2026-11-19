from flask import Flask, render_template, request, session, redirect, url_for
from datetime import datetime

app = Flask(__name__)
app.secret_key = "super_secret_key"      # required for session storage


# Login page - takes the name as input
@app.route("/")
def home():
    return render_template("login.html")


# Hello page - name is taken from the request and stored in the session
@app.route("/hello", methods=["GET", "POST"])
def hello():
    if request.method == "POST":
        name = request.form.get("name", "").strip()
        if name == "":
            return redirect(url_for("home"))
        session["name"] = name
        session["start_time"] = datetime.now().isoformat()

    if "name" not in session:
        return redirect(url_for("home"))

    start = datetime.fromisoformat(session["start_time"])
    return render_template("hello.html",
                           name=session["name"],
                           start_time=start.strftime("%d %b %Y, %I:%M:%S %p"))


# Logout page - shows thank you message with the duration of usage
@app.route("/logout")
def logout():
    if "name" not in session:
        return redirect(url_for("home"))

    name = session["name"]
    start = datetime.fromisoformat(session["start_time"])
    seconds = int((datetime.now() - start).total_seconds())
    minutes, secs = divmod(seconds, 60)

    session.clear()                      # end the session
    return render_template("logout.html", name=name, minutes=minutes, seconds=secs)


if __name__ == "__main__":
    app.run(debug=True)
