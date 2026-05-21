#include <iostream>
using namespace std; 
 
class MasterStudent 
{   
    string name, title; 
    int status; 
     
    public:  
    int publicint;
    MasterStudent(string n, string t, int x) 
    {  name = n; 
       title = t; 
       status = x; 
    } 
      
    MasterStudent() 
    { name = "Peter"; 
     title = "A Study on the Usability Factors of Mobile Apps."; 
     status = 1; 
    } 
      
    int getStatus() 
    { return status; 
    }  
    string getName() 
    { return name; 
    } 
    string getTitle() 
    { return title; 
    } 
    void setdata(string n, string t, int x) 
    {  name = n; 
       title = t; 
       status = x; 
    }
      
    ~MasterStudent(){
    cout<<"\n\n~End of Details~Student~"<<name<<"\n\n"; 
    }
};  
 
int main() 
{  MasterStudent MS[4]{MasterStudent("philop Morales","Working with geneartion X emplyees:food industry",1),MasterStudent("Cameron Connor","Collective Co-creation within the Open source software community",1),MasterStudent("Meriam Miles","What Makes Online Video Advertisements Go viral?",0),MasterStudent("Dory Dean","Social media use for corporate communications",0)};
  for(int i=0;i<4;i++){
    cout<<"================================="<<endl;  
    cout<<"   Masters Student Details       "<<endl; 
    cout<<"================================="<<endl; 
    cout<<"Name \t: "<<MS[i].getName()<<endl; 
    cout<<"Title \t: "<<MS[i].getTitle()<<endl; 
    cout<<"Status \t: "; 
    if(MS[i].getStatus() ==1) cout<<"Approved"<<endl<<endl; 
    else cout<<"Pending"<<endl<<endl;
    delete &MS[i];
  } 
}