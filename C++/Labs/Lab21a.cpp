#include<iostream>
#include<iomanip>
#include<cmath>
using namespace std;
float kineticEnergy(float, float,float&);

int main(){
    float KG, Velocity, KineticEnergy;
    cout<<"Enter an object's mass and velocity....\n\n"<<fixed<<setprecision(2);
    cout<<"Mass in kilograms: ";
    cin>>KG;
    cout<<"Velocity in meters per second: ";
    cin>>Velocity;
    kineticEnergy(KG,Velocity,KineticEnergy);
    
    cout<<"\nThe kinetic energy of this object is "<<KineticEnergy<<" joules";
}

float kineticEnergy(float M,float V,float &KE){
    KE = 1/2*M*pow(V,2);
    return KE
}