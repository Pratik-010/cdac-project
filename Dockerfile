FROM python
RUN pip install flask
WORKDIR /src
COPY . .
EXPOSE 4000
CMD python application.py
