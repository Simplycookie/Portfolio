#include <stdio.h>
int main(){
    FILE *fp;
    fp = fopen("Flight_deta.txt","r");
    if(fp == NULL){
        printf("File could not be opened!\nProgram stopped.\n");
        return 0;
    }
    char output[30];
    while(fscanf(fp,"%s", &output)==1)
    {
        printf("%s\n",output);
    }
    
    
    return 0;
}