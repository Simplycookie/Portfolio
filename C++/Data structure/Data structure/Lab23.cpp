#include <iostream>
using namespace std;
class BMI {
    private:
    float weight;
    float height;
    float bmi;
    public:
    BMI(){
        weight = 1.0;
        height = 1.0;
        calculate();
    }
    void set(float w, float h){
        weight = w;
        height = h;

    }
    void calculate(){
        bmi = weight / (height * height);
    }
    void display(){
        if(bmi < 18.5){
            cout << "Underweight" << endl;
        }
        else if(bmi >= 18.5 && bmi < 25){
            cout << "Normal weight" << endl;
        }
        else if(bmi >= 25 && bmi < 30){
            cout << "Overweight" << endl;
        }
        else{
            cout << "Obese" << endl;
        }
    }
};


int main(){
    BMI form;
    float w, h;
    cout<<"This program will calculate your body mass index."<<endl;
    cout<<"Enter you Height in meter (m) unit : ";
    cin>>h;
    cout<<"Enter you Weight in kilogram (kg) unit : ";
    cin>>w;
    form.set(w, h);
    form.calculate();
    form.display();
}