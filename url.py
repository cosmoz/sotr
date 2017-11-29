from flask import Flask
import xmltodict, json
from collections import Counter
app = Flask(__name__)

@app.route("/")
def hello():
	with open('book1.xml') as fd:
		doc1 = xmltodict.parse(fd.read())

	with open('book2.xml') as fd:
		doc2 = xmltodict.parse(fd.read())

	A = Counter(doc1['catalog'])
	B = Counter(doc2['catalog'])
	data = A + B
	
	return json.dumps(data)


@app.route("/genre/<genre>")
def genre(genre):
	with open('book1.xml') as fd:
		doc1 = xmltodict.parse(fd.read())

	with open('book2.xml') as fd:
		doc2 = xmltodict.parse(fd.read())

	data = []
	for book in doc1['catalog']['book']:
		if book['genre'] == genre:
			data.append(book)

	for book in doc2['catalog']['book']:
		if book['genre'] == genre:
			data.append(book)

	return json.dumps(data)


if __name__ == "__main__":
	app.run(host='0.0.0.0', port=5000, debug=True)