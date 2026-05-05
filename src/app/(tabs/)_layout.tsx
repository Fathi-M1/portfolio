import React, { memo } from 'react';
import { View, TouchableOpacity, Text } from 'react-native';
import { BlurView } from 'expo-blur';
import { NativeTabs } from 'expo-router/unstable-native-tabs';
import { useColorScheme } from 'react-native';
import { Haptics } from 'expo-haptics';
import { Ionicons } from '@expo/vector-icons';

const CustomTabBar = memo(({ state, descriptors, navigation }) => {
  const colorScheme = useColorScheme();
  const isDark = colorScheme === 'dark';

  return (
    <BlurView
      style={{
        position: 'absolute',
        bottom: 20,
        left: 20,
        right: 20,
        borderRadius: 20,
        borderWidth: 1,
        borderColor: 'rgba(255, 255, 255, 0.3)',
        overflow: 'hidden',
      }}
      tint={isDark ? 'dark' : 'light'}
      intensity={60}
    >
      <View style={{ flexDirection: 'row', padding: 10, gap: 10 }}>
        {state.routes.map((route, index) => {
          const { options } = descriptors[route.key];
          const label = options.tabBarLabel !== undefined ? options.tabBarLabel : options.title !== undefined ? options.title : route.name;
          const isFocused = state.index === index;

          const onPress = () => {
            Haptics.selectionAsync();
            const event = navigation.emit({
              type: 'tabPress',
              target: route.key,
              canPreventDefault: true,
            });
            if (!isFocused && !event.defaultPrevented) {
              navigation.navigate(route.name);
            }
          };

          const iconName = route.name === 'index' ? 'code-slash' : 'color-palette';
          const fontFamily = route.name === 'index' ? 'Inter' : 'System';

          return (
            <TouchableOpacity
              key={route.key}
              onPress={onPress}
              style={{ flex: 1, alignItems: 'center', paddingVertical: 5 }}
            >
              <Ionicons
                name={iconName}
                size={24}
                color={isFocused ? '#0D9488' : '#9CA3AF'}
              />
              <Text style={{ 
                color: isFocused ? '#0D9488' : '#9CA3AF', 
                fontFamily, 
                fontWeight: route.name === 'index' ? 'normal' : 'bold' 
              }}>
                {label}
              </Text>
            </TouchableOpacity>
          );
        })}
      </View>
    </BlurView>
  );
});

export default function TabLayout() {
  return (
    <NativeTabs
      tabBar={CustomTabBar}
      screenOptions={{
        headerShown: false,
      }}
    >
      <NativeTabs.Screen name="index" options={{ title: 'Coder' }} />
      <NativeTabs.Screen name="(designer)" options={{ title: 'Designer' }} />
    </NativeTabs>
  );
}