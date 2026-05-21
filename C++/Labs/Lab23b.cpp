#include<iostream>
using namespace std;

struct student{
    char name[30],grade;
    float Marks[5],aver;
};
char grades(float Average){
    char grade;
    if(Average >= 80){grade = 'A';}
    else if (Average >= 60){grade = 'B';}
    else if (Average >= 50){grade = 'C';}
    else{grade = 'F';}
    return grade;    
}

int main(){
    struct student stud1;
    cout<<"Enter name :";
    cin>>stud1.name;
    for(int i = 0;i < 5;i++){
        cout<<"Enter Marks :";
        cin>>stud1.Marks[i];
        stud1.aver += stud1.Marks[i];
    }
    stud1.aver = stud1.aver/5;
    stud1.grade = grades(stud1.aver);

    cout<<"\nName\t:"<<stud1.name<<endl;
    cout<<"Average\t:"<<stud1.aver<<endl;
    cout<<"grade\t:"<<stud1.grade;
}
