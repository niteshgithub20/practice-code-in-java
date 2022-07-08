import java.util.Scanner;
class A{
    public static void main(String[] args){
        System.out.print("Enter your number for checking prime number : ");
        Scanner sc=new Scanner(System.in);
        int n=sc.nextInt();
        int i,count=0;
        
        for(i=2;i<n-1;i++){
            if(n%i==0){
                count++;
            }
            
        }
        if(count==0){
            System.out.println("prime is : "+n);
        }
        else{
            System.out.println("not prime is : "+n);
        }
    }
}