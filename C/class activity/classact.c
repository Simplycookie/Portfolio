#include <stdio.h>

//find the average of 6 numbers inputed by the user, all 6 numbers must be put into an Array called number
//make a function that has an array parameter to calculate the average of 6 numbers using the for-loop
float avarege(float num[10]);
float printlistoff(float num[10]);

int main(){
    float num[6];
    int i;

    for(i=0;i<6;i++){
        printf("Enter number %d :",i+1);
        scanf("%f",&num[i]);
    }
    printf("average of ");
    printlistoff(num);
    printf("is : %.2f", avarege(num));
    return 0;
}

float avarege(float num[10]){
    int i;
    float total=0,count=0,num0=0.001;
    for (i = 0; i < 10; i++)
    {
        if(num[i] > num0){
            count+=1;
            total += num[i];
        }
        else{
            total = total / count;
            printf("%f",num0);
            return total;
        }
    }
    
    
}

float printlistoff(float x[10]){
    int i;
    float num0=0;
    for (i = 0; i < 10; i++){
        if(x[i] > num0){
            printf("%.0f,",x[i]);
        }
        else{
            return x[i];
            }
    }
}